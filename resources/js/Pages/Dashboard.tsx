import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';

export default function Dashboard() {

    const teams = [
        { id: 1, name: 'Team 1' },
        { id: 2, name: 'Team 2' },
        { id: 3, name: 'Team 3' },
    ];

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            {teams.map((team: any) => (
                                <div key={team.id}>
                                    <Link href={`/teams/${team.id}`} className='block px-4 py-2 mb-2 text-sm text-gray-900 bg-gray-100 rounded hover:bg-gray-200'>{team.name}</Link>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
