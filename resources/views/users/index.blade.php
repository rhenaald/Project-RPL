

<x-app-layout>
  <div class="font-sans overflow-x-auto mx-14 my-4 rounded-lg">
      <div class="flex justify-between items-center mb-4">
          <h2 class="text-3xl font-extrabold text-gray-800">Daftar User</h2>
          <a href="{{ route('users.create') }}" class="px-4 py-2 bg-blue-400 text-white rounded-md">Tambah Pengguna</a>
      </div>
        @if(session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif

      <table class="min-w-full bg-white border-collapse">
          <thead class="whitespace-nowrap border-b">
              <tr>
                  <th class="p-4 text-left text-lg font-semibold text-gray-800">Name</th>
                  <th class="p-4 text-left text-lg font-semibold text-gray-800">Email</th>
                  <th class="p-4 text-left text-lg font-semibold text-gray-800">Role</th>
                  <th class="p-4 text-left text-lg font-semibold text-gray-800">Joined At</th>
                  <th class="p-4 text-left text-lg font-semibold text-gray-800">Actions</th>
              </tr>
          </thead>

          <tbody class="whitespace-nowrap">
              @forelse ($users as $user)
                  <tr class="hover:bg-gray-50">
                    <td class="p-4 text-left text-lg text-gray-800">
                        <a href="{{ route('users.show', $user->id) }}" class="text-gray-800 hover:underline">
                            {{ $user->name }}
                        </a>
                    </td>
                      <td class="p-4 text-left text-lg text-gray-800">{{ $user->email }}</td>
                      <td class="p-4 text-left text-lg text-gray-800">{{ $user->roles[0]['name'] }}</td>
                      <td class="p-4 text-left text-lg text-gray-800">{{ $user->created_at->format('Y-m-d') }}</td>
                      <td class="p-4 text-left flex space-x-4">
                        <a href="{{ route('users.edit', $user->id) }}">
                          <button class="hover:text-blue-700" title="Edit">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500" viewBox="0 0 348.882 348.882">
                                  <path d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z" />
                                  <path d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z" />
                              </svg>
                          </button>
                          <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:text-red-700" title="Delete" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500" viewBox="0 0 24 24">
                                    <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z" />
                                    <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z" />
                                </svg>
                            </button>
                        </form>
                      </td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="5" class="p-4 text-left text-lg text-gray-600">
                          <div class="flex items-center">
                              <div class="bg-yellow/30 text-yellow-dark mr-5 flex h-[34px] w-[34px] items-center justify-center rounded-md">
                                  <svg width="18" height="18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M17.0156 11.6156L10.9969 1.93125C10.5188 1.28437 9.78752 0.91875 9.00002 0.91875C8.18439 0.91875 7.45314 1.28437 7.00314 1.93125L0.984395 11.6156C0.421895 12.375 0.33752 13.3594 0.759395 14.2031C1.18127 15.0469 2.02502 15.5813 2.98127 15.5813H15.0188C15.975 15.5813 16.8188 15.0469 17.2406 14.2031C17.6625 13.3875 17.5781 12.375 17.0156 11.6156ZM16.1156 13.6406C15.8906 14.0625 15.4969 14.3156 15.0188 14.3156H2.98127C2.50315 14.3156 2.10939 14.0625 1.88439 13.6406C1.68752 13.2188 1.71564 12.7406 1.99689 12.375L8.01564 2.69062C8.24064 2.38125 8.60627 2.18437 9.00002 2.18437C9.39377 2.18437 9.75939 2.35312 9.9844 2.69062L16.0031 12.375C16.2844 12.7406 16.3125 13.2188 16.1156 13.6406Z" />
                                      <path d="M8.99996 6.94373C8.53121 6.94373 8.15308 7.32185 8.15308 7.7906V10.2687C8.15308 10.7375 8.53121 11.1156 8.99996 11.1156C9.46871 11.1156 9.84683 10.7375 9.84683 10.2687V7.7906C9.84683 7.32185 9.46871 6.94373 8.99996 6.94373Z" />
                                      <path d="M9 13.0188C9.52187 13.0188 9.95625 12.5844 9.95625 12.0625C9.95625 11.5406 9.52187 11.1062 9 11.1062C8.47813 11.1062 8.04375 11.5406 8.04375 12.0625C8.04375 12.5844 8.47813 13.0188 9 13.0188Z" />
                                  </svg>
                              </div>
                              <span class="text-lg font-medium">Tidak ada pengguna yang ditemukan.</span>
                          </div>
                      </td>
                  </tr>
              @endforelse
            </tbody>
          </table>
          <!-- Pagination -->
          <div class="mt-4 bg-red-900">
             {{ $users->links() }}
         </div>
    </div>
</x-app-layout>
