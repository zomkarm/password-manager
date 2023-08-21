<x-layout>
    <div class="flow-root">
        <ul class="float-right p-4">
            <li><a href="{{ url('credential') }}" class="p-2 bg-violet-400 text-white">Add credential</a></li>
        </ul>
    </div>
    
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Website Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($credentials as $credential)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $credential->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $credential->website_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $credential->username }}
                        </td>
                        <td class="px-6 py-4">
                            <a data-nm="{{ $credential->website_name }}" data-wu="{{ $credential->website_url }}" data-un="{{ $credential->username }}" data-ps="{{ $credential->password }}" href="javascript:void(0)" class="bg-green-600 p-2 text-white view_credential" data-modal-target="credentialModal" data-modal-toggle="credentialModal" >View</a>
                            <a class="bg-violet-600 p-2 text-white">Edit</a>
                            <form class="inline" method="POST" action="{{ url('credential/'.$credential->id) }}">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="bg-red-600 p-2 text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

    <x-card id="credentialModal">
        <x-slot name="heading">
            Credential
        </x-slot>

        <div>
            <label for="website_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website Name</label>
            <div class="flex">
                <input type="text" id="website_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Abcd" readonly>
                <a class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" onclick="copyText('website_name')">Copy</a>
            </div>
        </div>
        <div>
            <label for="website_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website URL</label>
            <div class="flex">
                <input type="text" id="website_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="http://abcd.com" readonly>
                <a class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" onclick="copyText('website_url')">Copy</a>
            </div>
        </div>
        <div>
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username (*)</label>
            <div class="flex">
                <input type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="abcd@com / 1223456" readonly>
                <a class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" onclick="copyText('username')">Copy</a>
            </div>
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password (*)</label>
            <div class="flex">
                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly>
                <a class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" onclick="copyText('password')">Copy</a>
            </div>
        </div> 
    </x-card>
</x-layout>

<script>
    $(document).ready(function(){
        $('.view_credential').click(function(){
            let nm = $(this).attr('data-nm');
            let wu = $(this).attr('data-wu');
            let un = $(this).attr('data-un');
            let ps = $(this).attr('data-ps');
            
            $('#website_name').val(nm);
            $('#website_url').val(wu);
            $('#username').val(un);
            $('#password').val(ps);

            try{
                $('#credentialModal').modal('show');
            }catch(e){

            }
        })
    }); 
    function copyText(id) {
        // Get the text field
        var copyText = document.getElementById(id);

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the text");
        }
</script>