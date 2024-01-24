<div>

    <div class="min-w-screen h-full py-5">
        <div class="px-5 max-w-7xl mx-auto flex items-center justify-between">
            <div>
                <div class="mb-2">
                    <a href="#" class="focus:outline-none hover:underline text-gray-500 text-sm"><i class="mdi mdi-arrow-left text-gray-400"></i>Back</a>
                </div>
                <div class="mb-2">
                    <h1 class="text-3xl md:text-5xl font-bold text-gray-600">Checkout.</h1>
                </div>
                <div class="mb-5 text-gray-400">
                    <a href="#" class="focus:outline-none hover:underline text-gray-500">Home</a> / <a href="#" class="focus:outline-none hover:underline text-gray-500">Cart</a> / <span class="text-gray-600">Checkout</span>
                </div>
            </div>
            <div class="flex flex-col items-end">
                <div class="">Total</div>
                <div class="font-bold text-3xl">₹{{ $totalItemAmount }}</div>
            </div>
        </div>

        <div class="w-full bg-white border-t h-full px-5 py-10 text-gray-800">
            <div class="px-3 max-w-7xl mx-auto grid grid-cols-2 gap-9">
                <section class="w-full">
                    <div class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                        <div class="w-full flex mb-3 items-center">
                            <div class="w-40"><span class="text-gray-600 font-semibold">Name</span></div>
                            <div class="w-full">
                                <x-input type="text" wire:model="fullname" class="flex-grow pl-3" />
                                @error('fullname')<small class="text-red-400 text-xs">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="w-full flex mb-3 items-center">
                            <div class="w-40"><span class="text-gray-600 font-semibold">Email</span></div>
                            <div class="w-full">
                                <x-input type="email" wire:model="email" class="flex-grow pl-3" />
                                @error('email')<small class="text-red-400 text-xs">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="w-full flex mb-3 items-center">
                            <div class="w-40"><span class="text-gray-600 font-semibold">Phone</span></div>
                            <div class="w-full">
                                <x-input type="text" wire:model="phone" class="flex-grow pl-3" />
                                @error('phone')<small class="text-red-400 text-xs">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="w-full flex mb-3 items-center">
                            <div class="w-40"><span class="text-gray-600 font-semibold">Pincode</span></div>
                            <div class="w-full">
                                <x-input type="text" wire:model="pincode" class="flex-grow pl-3" />
                                @error('pincode')<small class="text-red-400 text-xs">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="w-full flex mb-3 items-center">
                            <div class="w-40"><span class="text-gray-600 font-semibold">Address</span></div>
                            <div class="w-full">
                                <x-input type="text" wire:model="address" class="flex-grow pl-3" />
                                @error('address')<small class="text-red-400 text-xs">{{ $message }}</small>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light">
                        <h2>Select payment mode</h2>
                        <div class="flex items-center gap-4">
                            <button wire:click="codOrder()" class="border rounded-lg px-4 py-1.5">Cash On Delivery</button>
                            <button class="border bg-gray-800 text-white rounded-lg px-4 py-1">Online Payment</button>
                        </div>
                    </div>
                </section>

                <section class="w-full">
                    <div class="w-full mx-auto rounded-lg bg-white border border-gray-200 text-gray-800 font-light mb-6">
                        <div class="w-full p-3 border-b border-gray-200">
                            <div class="mb-5">
                                <label for="type1" class="flex items-center cursor-pointer">
                                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-6 ml-3">
                                </label>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Name on card</label>
                                    <div>
                                        <input class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="John Smith" type="text"/>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Card number</label>
                                    <div>
                                        <input class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000 0000 0000 0000" type="text"/>
                                    </div>
                                </div>
                                <div class="mb-3 -mx-2 flex items-end">
                                    <div class="px-2 w-1/4">
                                        <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Expiration date</label>
                                        <div>
                                            <select class="form-select w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                                <option value="01">01 - January</option>
                                                <option value="02">02 - February</option>
                                                <option value="03">03 - March</option>
                                                <option value="04">04 - April</option>
                                                <option value="05">05 - May</option>
                                                <option value="06">06 - June</option>
                                                <option value="07">07 - July</option>
                                                <option value="08">08 - August</option>
                                                <option value="09">09 - September</option>
                                                <option value="10">10 - October</option>
                                                <option value="11">11 - November</option>
                                                <option value="12">12 - December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="px-2 w-1/4">
                                        <select class="form-select w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                        </select>
                                    </div>
                                    <div class="px-2 w-1/4">
                                        <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Security code</label>
                                        <div>
                                            <input class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="text"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-3">
                            <label for="type2" class="flex items-center cursor-pointer">
                                <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type2">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" width="80" class="ml-3"/>
                            </label>
                        </div>
                    </div>
                    <div>
                        <button class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
