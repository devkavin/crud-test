import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, useForm } from '@inertiajs/react';



export default function TeamEdit({ team }: { team: any } ) {
    const { data, setData, patch, processing, errors } = useForm({
        id: team.id,
        conference: team.conference,
        division: team.division,
        city: team.city,
        name: team.name,
        full_name: team.full_name,
        abbreviation: team.abbreviation,
    });

    const onClick = () => {
        patch(route('teams.update', team.id), {
            onSuccess: () => {
                alert('Team updated');
            },
        });
    }

    return (
        <AuthenticatedLayout
            header={
                <div
                     className="flex items-center justify-between w-full"
                >
                    <h2 className="text-xl font-semibold leading-tight text-gray-800">
                        Team Details
                    </h2>

                    <div className="mt-3">
                        <PrimaryButton
                            onClick={onClick}
                            disabled={processing}
                        >
                            {processing ? 'Saving...' : 'Save'}
                        </PrimaryButton>
                    </div>
                </div>
            }
        >
            <Head title="Show" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <div className="mb-4">
                                <label
                                    htmlFor="id"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    ID
                                </label>
                                <TextInput
                                    id="id"
                                    type="text"
                                    className="mt-1 block w-full"
                                    value={data.id}
                                    onChange={(e) => setData('id', e.target.value)}
                                />
                            </div>

                            <div className="mb-4">
                                <label
                                    htmlFor="conference"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Conference
                                </label>
                                <TextInput
                                    id="conference"
                                    type="text"
                                    className="mt-1 block w-full"
                                    value={data.conference}
                                    onChange={(e) => setData('conference', e.target.value)}
                                />
                            </div>

                            <div className="mb-4">
                                <label
                                    htmlFor="division"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Division
                                </label>
                                <TextInput
                                    id="division"
                                    type="text"
                                    className="mt-1 block w-full"
                                    value={data.division}
                                    onChange={(e) => setData('division', e.target.value)}
                                />
                            </div>

                            <div className="mb-4">
                                <label
                                    htmlFor="city"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    City
                                </label>
                                <TextInput
                                    id="city"
                                    type="text"
                                    className="mt-1 block w-full"
                                    value={data.city}
                                    onChange={(e) => setData('city', e.target.value)}
                                />
                            </div>

                            <div className="mb-4">
                                <label
                                    htmlFor="name"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Name
                                </label>
                                <TextInput
                                    id="name"
                                    type="text"
                                    className="mt-1 block w-full"
                                    value={data.name}
                                    onChange={(e) => setData('name', e.target.value)}
                                />
                            </div>

                            <div className="mb-4">
                                <label
                                    htmlFor="full_name"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Full Name
                                </label>
                                <TextInput
                                    id="full_name"
                                    type="text"
                                    className="mt-1 block w-full"
                                    value={data.full_name}
                                    onChange={(e) => setData('full_name', e.target.value)}
                                />
                            </div>
                            <div className="mb-4">
                                <label
                                    htmlFor="abbreviation"
                                    className="block text-sm font-medium text-gray-700"
                                >
                                    Abbreviation
                                </label>
                                <TextInput
                                    id="abbreviation"
                                    type="text"
                                    className="mt-1 block w-full"
                                    value={data.abbreviation}
                                    onChange={(e) => setData('abbreviation', e.target.value)}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
