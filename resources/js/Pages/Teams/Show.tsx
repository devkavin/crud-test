import TextInput from '@/Components/TextInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';



export default function Teams(  ) {

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Team Details
                </h2>
            }
        >
            <Head title="Show" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            {/* <TextInput
                                value={team.team.name}
                                onChange={() => {}}
                            >
                            </TextInput> */}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}