<div class="p-4 bg-white dark:bg-gray-800 shadow rounded-lg text-gray-900 dark:text-white">
    <h2 class="text-lg font-bold mb-4">Quick Actions</h2>

    <div class="flex flex-col gap-2">
        
        <a href="{{ \App\Filament\Resources\EmployeeResource::getUrl('create') }}"
           class="block p-3 rounded-lg text-center
                  bg-blue-500 text-dark hover:bg-blue-600
                  dark:bg-blue-600 dark:hover:bg-blue-500">
            ➕ Tambah Pegawai
        </a>

        <a href="{{ \App\Filament\Resources\EmployeeResource::getUrl('index') }}"
           class="block p-3 bg-gray-300 text-gray-900 rounded-lg text-center 
                   dark:bg-gray-700 dark:text-white">
            📄 Lihat Semua Pegawai
        </a>
    </div>
</div>
