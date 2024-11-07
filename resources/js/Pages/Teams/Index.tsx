import PrimaryButton from '@/Components/PrimaryButton';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, router } from '@inertiajs/react';
import { useState } from 'react';


export default function Teams( { teams }: { teams: any } ) {

    const [currentTeams, setCurrentTeams] = useState(teams);
    const [isLoading, setIsLoading] = useState(false);

    const fetchTeams = () => {
        setIsLoading(true);
        router.get(route('teams.getTeams'), {}, {
            onSuccess: (response) => {
                setCurrentTeams(response);
                setIsLoading(false);
            },
            onError: () => {
                setIsLoading(false);
                console.error('Failed to fetch teams');
            }
        });
    };

    return (
        <AuthenticatedLayout
            header={
                <div
                className="flex items-center justify-between w-full"
                >
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Teams
                </h2>
             <PrimaryButton onClick={fetchTeams} disabled={isLoading}>
                    {isLoading ? 'Loading...' : 'Fetch Teams'}
                </PrimaryButton>
                </div>
            }
        >
            <Head title="Teams" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                        {currentTeams.map((team: any) => (
                                <div key={team.id}>
                                    <Link
                                        href={`/teams/${team.id}`}
                                        method="get"
                                        className="block px-4 py-2 mb-2 text-sm text-gray-900 bg-gray-100 rounded hover:bg-gray-200"
                                    >
                                        {team.name}
                                    </Link>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
