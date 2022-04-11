<div>
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                <select data-placeholder="Contract" wire:model="process" class="form-select w-full">
                    <option value="2">Not Processed</option>
                    <option value="1">Processed</option>
                </select>
            </div>
        </div>
        <div class="p-5 overflow-x-auto" id="responsive-table">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Username</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Requisite</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Amount</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Time</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">TX ID</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td class="border-b whitespace-nowrap">{{ ++$no }}</td>
                            <td class="border-b whitespace-nowrap">{{ $row->owner->username }}</td>
                            <td class="border-b whitespace-nowrap">{{ $row->requisite }} {{ $row->user->username }} ($ {{ number_format($row->user->contract->value) }})</td>
                            <th class="border-b whitespace-nowrap">{{ $row->amount }}</th>
                            <td class="border-b whitespace-nowrap">{{ $row->created_at }}</td>
                            <td class="border-b whitespace-nowrap">{{ $row->information }}</td>
                            <td class="border-b whitespace-nowrap text-right">
                                @if((int)$key===$row->getKey())
                                <a href="javascript:;" wire:click="process()" class="btn btn-success">Yes, Process</a>
                                <a wire:click="delete()" href="javascript:;" class="btn btn-danger">Delete</a>
                                <a wire:click="cancel()" href="javascript:;" class="btn btn-warning">Cancel</a>
                                @else
                                <a href="javascript:;" wire:click="setKey({{ $row->getKey() }})" class="btn btn-primary">Proccess</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col sm:flex-row items-center mt-5">
                <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
