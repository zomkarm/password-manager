<x-layout>
    <div class=" top-0 left-0 w-full h-full flex items-center justify-center">
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" method="POST" action="{{ url('/credential/update/'.$credential->id) }}">
                @csrf
                @method('PUT')
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Edit Credential</h5>
                <div>
                    <label for="website_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website Name</label>
                    <input type="website_name" name="website_name" id="website_name" value="{{ $credential->website_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Abcd">
                    @error('website_name')
                        <span class="text-red-600 font-italic">{{ $message }}</span>   
                    @enderror
                </div>
                <div>
                    <label for="website_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website URL</label>
                    <input type="website_url" name="website_url" id="website_url" value="{{ $credential->website_url }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="http://abcd.com">
                    @error('website_url')
                        <span class="text-red-600 font-italic">{{ $message }}</span>   
                    @enderror
                </div>
                <div>
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username (*)</label>
                    <input type="username" name="username" id="username" value="{{ $credential->username }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="abcd@com / 1223456" required>
                    @error('username')
                        <span class="text-red-600 font-italic">{{ $message }}</span>   
                    @enderror
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password (*)</label>
                    <input type="password" name="password" id="password" value="{{ $credential->password }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    @error('password')
                        <span class="text-red-600 font-italic">{{ $message }}</span>   
                    @enderror
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>
</x-layout>