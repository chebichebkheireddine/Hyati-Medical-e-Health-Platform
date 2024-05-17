
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Customer
                                </th>


                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Specialite
                                </th>                                

                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @foreach ($doctors as $doctor)
                            <tr>
                                
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                    <div class="flex items-center gap-x-2">
                                        <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="">
                                        <div>
                                            <h2 class="text-sm font-medium text-gray-800 dark:text-white ">{{ $doctor->firstName  }} {{ $doctor->firstName }}</h2>
                                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">{{ $doctor->email }}</p>
                                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">{{ $doctor->address }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                    @foreach ($doctor->specialization as $spec)
                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                        
                                        <h2 class="text-sm font-normal">{{ $spec->specialization_name }}</h2>
                                    </div>
                                    @endforeach
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center gap-x-6">
                                        <x-form.model name="Edit Doctor" id="editDoc{{ $doctor->sysId }}"
                                            class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400"
                                            size="modal-xl">
    
                                            <x-slot name="button">
                                                Edit
                                            </x-slot>
    
                                            <form method="post"
                                                action="{{ route('admin.doctor.update', ['doctor' => $doctor->sysId]) }}">
                                                @csrf
                                                @method('patch')
                                                <div class="row">
                                                    <div class="col-4">
                                                        {{--  --}}
                                                        <x-form.modal-body>
                                                            <x-form.label name="specialization"></x-form.label>
                                                            <select name="specializations[]" id="specialization" multiple>
    
                                                                @foreach ($specializations as $sp)
                                                                    <option value="{{ $sp->specialization_id }}">
                                                                        {{ $sp->specialization_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </x-form.modal-body>
                                                        {{-- {{--  --}}
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="User Name" />
                                                                <x-form.input name="username" :value="old('username', $doctor->username)" />
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="Last Name" />
                                                                <x-form.input name="lastName" :value="old('lastName', $doctor->lastName)" />
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="First Name" />
                                                                <x-form.input name="firstName" :value="old('firstName', $doctor->firstName)" />
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                    </div>
                                                    <div class="col-4">
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="wilaya" />
                                                                <select name="wilayaId" id="SelectW"class="form-select">
    
                                                                    @foreach ($wilaya as $item1)
                                                                        <option value="{{ $item1->id }}">
                                                                            {{ $item1->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="baldya" />
                                                                <select name="baldyaid" id="SelectBaldya"
                                                                    class="form-select">
    
                                                                </select>
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                        {{-- Oganzation --}}
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="oganization"></x-form.label>
                                                                <select name="organization" id="oganization"
                                                                    class="form-select">
    
                                                                    @foreach ($organization as $org)
                                                                        <option value="{{ $org->org_id }}">
                                                                            {{ $org->org_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="National ID" />
                                                                <x-form.input name="nationalId" :value="old('nationalId', $doctor->nationalId)" />
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                    </div>
                                                    <div class="col-4">
    
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="email" />
                                                                <x-form.input name="email" type="email"
                                                                    :value="old('email', $doctor->email)" />
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="Phone" />
                                                                <x-form.input name="phone" :value="old('phone', $doctor->phone_number)" />
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="address" />
                                                                <x-form.input name="address" :value="old('address', $doctor->lastName)" />
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                        <x-form.modal-body>
                                                            <x-form.panel>
                                                                <x-form.label name="password" />
                                                                <x-form.input name="password" type="password"
                                                                    :value="old('password', $doctor->password)" />
                                                            </x-form.panel>
                                                        </x-form.modal-body>
                                                    </div>
    
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success "
                                                        data-bs-dismiss="modal">Edite</button>
                                                </div>
                                            </form>
    
    
    
                                        </x-form.model>
                                    <form method="post"
                                        action="{{ route('admin.doctor.delete', ['doctor' => $doctor->sysId]) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</button>
                                    </form>
                                     <x-form.model name="Permission" id="permision" class="rounded  py-1 px-2 ">

                                        <x-slot name="button">
                                            <span><i class="fa-solid fa-gear"></i></span>
                                        </x-slot>

                                        <form method="POST" action="{{ route('admin.doctor.create') }}">
                                            @csrf

                                            <x-form.modal-body>
                                                <x-form.panel>
                                                    <x-form.label name="name" />
                                                    <x-form.input name="name" />
                                                </x-form.panel>
                                            </x-form.modal-body>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success "
                                                    data-bs-dismiss="modal">Add</button>
                                            </div>
                                        </form>



                                    </x-form.model> 
                                

                                        
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    