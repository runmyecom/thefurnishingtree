<form wire:submit="save">
    <div class="header-section flex items-center justify-between p-6">
        <a href="/products" class="flex items-center gap-1"><x-icon-back class="w-5 h-5" /> back</a>
        <div class="flex items-center gap-2">
            <x-outline-button>Save as draft</x-outline-button>
            <button class="text-sm bg-indigo-600 text-white font-semibold px-4 h-10 rounded-lg flex items-center gap-2 justify-center" type="submit">
                Publish product
                <div wire:loading>
                    <x-icons.loading class="w-5 h-5" />
                </div>
            </button>
        </div>
    </div>

    <hr class="border border-dashed" />

    <!-- Basic Details -->
    <section class="p-6">
        <h3 class="mb-6 font-bold">General information*</h3>
        <div class="grid grid-cols-2 gap-6">
            <!-- Select NodeID -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">Browse Node</label>
                <div class="relative">
                    <select data-hs-select='{
                        "hasSearch": true,
                        "searchPlaceholder": "Search...",
                        "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                        "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                        "placeholder": "Browse Node...",
                        "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                        "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
                        }' class="hidden">
                        <option value="">Choose</option>
                        <option value="afghanistan" data-hs-select-option=''>
                            Afghanistan
                        </option>
                        <option value="india" data-hs-select-option=''>
                            India
                        </option>
                    </select>

                    <div class="absolute top-1/2 end-3 -translate-y-1/2">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                    </div>
                </div>
            </div>
            <!-- Product name -->
            <div>
                <label for="name" class="text-gray-500 text-sm font-semibold">Product Name*</label>
                <x-input placeholder="Product name" wire:model="form.name" id="name" />
                <span class="text-xs text-red-200">
                    @error('form.name'){{ $message }} @enderror
                </span>
            </div>
            <!-- Product Dimension -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">Product Dimension</label>
                <x-input placeholder="Product Dimension" wire:model="form.dimension" />
            </div>
            <!-- Product Weight -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">Product Weight</label>
                <x-input placeholder="Product Weight" wire:model="form.dimension" />
            </div>
            <!-- Packaging Dimension -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">Packaging Dimension</label>
                <x-input placeholder="Packaging Dimension" wire:model="form.dimension" />
            </div>
            <!-- Packaging Weight -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">Packaging Weight</label>
                <x-input placeholder="Packaging Weight" wire:model="form.dimension" />
            </div>
            

            <!-- Select Material -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">Select Material</label>
                <div class="relative">
                    <select data-hs-select='{
                        "hasSearch": true,
                        "searchPlaceholder": "Search...",
                        "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                        "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                        "placeholder": "Select country...",
                        "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                        "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
                        }' class="hidden">
                        <option value="">Choose</option>
                        <option value="afghanistan" data-hs-select-option=''>
                            Afghanistan
                        </option>
                        <option value="india" data-hs-select-option=''>
                            India
                        </option>
                    </select>

                    <div class="absolute top-1/2 end-3 -translate-y-1/2">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                    </div>
                </div>
            </div>
            <!-- Select Brand -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">Select Brand</label>
                <div class="relative">
                    <select data-hs-select='{
                        "hasSearch": true,
                        "searchPlaceholder": "Search brand...",
                        "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                        "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                        "placeholder": "Select country...",
                        "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                        "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
                        }' class="hidden">
                        <option value="">Choose</option>
                        <option value="afghanistan" data-hs-select-option=''>
                            Afghanistan
                        </option>
                        <option value="india" data-hs-select-option=''>
                            India
                        </option>
                    </select>

                    <div class="absolute top-1/2 end-3 -translate-y-1/2">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                    </div>
                </div>
            </div>
            <!-- Select Size -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">Select Size</label>
                <div class="relative">
                    <select data-hs-select='{
                        "hasSearch": true,
                        "searchPlaceholder": "Search brand...",
                        "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                        "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                        "placeholder": "Select country...",
                        "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                        "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
                        }' class="hidden">
                        <option value="">Choose</option>
                        <option value="afghanistan" data-hs-select-option=''>
                            Afghanistan
                        </option>
                        <option value="india" data-hs-select-option=''>
                            India
                        </option>
                    </select>

                    <div class="absolute top-1/2 end-3 -translate-y-1/2">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                    </div>
                </div>
            </div>
            <!-- Select Model -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">Select Model</label>
                <div class="relative">
                    <select data-hs-select='{
                        "hasSearch": true,
                        "searchPlaceholder": "Search brand...",
                        "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                        "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                        "placeholder": "Select country...",
                        "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                        "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
                        }' class="hidden">
                        <option value="">Choose</option>
                        <option value="afghanistan" data-hs-select-option=''>
                            Afghanistan
                        </option>
                        <option value="india" data-hs-select-option=''>
                            India
                        </option>
                    </select>

                    <div class="absolute top-1/2 end-3 -translate-y-1/2">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Price and Tax -->
        <div class="grid lg:grid-cols-3 gap-6 mt-6">
            <!-- MRP -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">MRP</label>
                <x-input placeholder="MRP" wire:model="form.mrp" />
            </div>
            <!-- Selling Price -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">Selling Price</label>
                <x-input placeholder="Selling Price" wire:model="form.selling_price" />
            </div>
            <!-- HSN Code -->
            <div>
                <label class="text-gray-500 text-sm font-semibold">HSN Code (Tax)</label>
                <x-input placeholder="HSN Code" wire:model="form.selling_price" />
            </div>
        </div>
    </section>

    <hr class="border border-dashed my-2" />

    <section class="p-6">
        <!-- Bullet Points -->
        <label for="title" class="text-gray-500 text-sm font-semibold">Bullet Points</label>
        <div class="flex gap-3 items-center w-full">
            <div id="hs-wrapper-for-copy">
                <input id="hs-content-for-copy" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Enter Name">
            </div>
            <button class="w-8 hover:text-red-500">X</button>
        </div>

        <p class="mt-3 text-end">
            <button 
                type="button" 
                data-hs-copy-markup='{
                    "targetSelector": "#hs-content-for-copy",
                    "wrapperSelector": "#hs-wrapper-for-copy",
                    "limit": 6
                }' 
                id="hs-copy-content" 
                class="py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full border border-dashed border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="flex-shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Add Point
            </button>
        </p>

        <!-- Product Description -->
        <div class="mt-5">
            <label for="title" class="text-gray-500 text-sm font-semibold">Product Description*</label>
            <!-- <x-forms.tinymce-editor /> -->

            <x-forms.tinymce wire:model.live="form.description" placeholder="Type anything you want..." />
        </div>

    </section>

    <hr class="border border-dashed my-2" />

    <!-- Media -->
    <section class="p-6">
        <h3 class="mb-2 font-bold">Image Gallery</h3>
        <div class="border-2 border-dashed rounded-xl flex flex-col items-center justify-center py-8 cursor-pointer hover:border-teal-400">
            <h3>Click to browse</h3>
            <p class="text-gray-500 text-sm">1200 x 1600 (3:4) recommended, up to 10MB each</p>
        </div>
        <div class="flex items-center w-full gap-10 my-6">
            <img src="/images/hero.webp" alt="" class="w-32 object-cover h-full rounded-lg">
            <div>
                <h3>Imagenamendns.jpg</h3>
                <p class="text-sm text-gray-600">130kb</p>
            </div>
            <button class="ml-auto bg-red-100 text-red-500 h-7 w-7 rounded flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-2.917 2.925q-.276.275-.704.275t-.704-.275q-.275-.275-.275-.7t.275-.7L10.6 12L7.675 9.108Q7.4 8.832 7.4 8.404q0-.427.275-.704q.275-.275.7-.275t.7.275L12 10.625L14.892 7.7q.276-.275.704-.275q.427 0 .704.275q.3.3.3.712t-.3.688L13.375 12l2.925 2.917q.275.276.275.704t-.275.704q-.3.3-.712.3t-.688-.3L12 13.4Z"/></svg>
            </button>
        </div>

        <!-- Video -->
        <h3 class="mb-2 font-bold">Video</h3>
        <div class="border-2 border-dashed rounded-xl flex flex-col items-center justify-center py-8 cursor-pointer hover:border-teal-400">
            <h3>Click to browse</h3>
            <p class="text-gray-500 text-sm">1200 x 1600 (3:4) recommended, up to 10MB each</p>
        </div>
        <div class="flex items-center w-full gap-10 mt-6">
            <img src="/images/hero.webp" alt="" class="w-32 object-cover h-full rounded-lg">
            <div>
                <h3>Imagenamendns.jpg</h3>
                <p class="text-sm text-gray-600">130kb</p>
            </div>
            <button class="ml-auto bg-red-100 text-red-500 h-7 w-7 rounded flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-2.917 2.925q-.276.275-.704.275t-.704-.275q-.275-.275-.275-.7t.275-.7L10.6 12L7.675 9.108Q7.4 8.832 7.4 8.404q0-.427.275-.704q.275-.275.7-.275t.7.275L12 10.625L14.892 7.7q.276-.275.704-.275q.427 0 .704.275q.3.3.3.712t-.3.688L13.375 12l2.925 2.917q.275.276.275.704t-.275.704q-.3.3-.712.3t-.688-.3L12 13.4Z"/></svg>
            </button>
        </div>
    </section>

    <hr class="border border-dashed my-2" />

    <!-- Seo Section -->
    <section class="p-6">
        <h3 class="mb-2 font-bold">SEO Meta</h3>
        <div>
            <label class="text-gray-500 text-sm font-semibold">Meta Keywords</label>
            <!-- Select -->
            <div class="relative">
                <select multiple data-hs-select='{
                    "hasSearch": true,
                    "placeholder": "Select option...",
                    "toggleTag": "<button type=\"button\"></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-100 dark:border-gray-100 dark:text-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                    "dropdownClasses": "mt-2 z-50 w-full max-h-[300px] p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                    "mode": "tags",
                    "tagsClasses": "relative ps-0.5 pe-9 min-h-[46px] flex items-center flex-wrap text-nowrap w-full border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-100 dark:border-gray-100 dark:text-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                    "tagsItemTemplate": "<div class=\"flex flex-nowrap items-center relative z-10 bg-white border border-gray-200 rounded-full p-1 m-1 dark:bg-slate-900 dark:border-gray-700\"><div class=\"h-6 w-6 me-1\" data-icon></div><div class=\"whitespace-nowrap\" data-title></div><div class=\"inline-flex flex-shrink-0 justify-center items-center h-5 w-5 ms-2 rounded-full text-gray-800 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 text-sm dark:bg-gray-700/50 dark:hover:bg-gray-700 dark:text-gray-400 cursor-pointer\" data-remove><svg class=\"flex-shrink-0 w-3 h-3\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M18 6 6 18\"/><path d=\"m6 6 12 12\"/></svg></div></div>",
                    "tagsInputClasses": "absolute inset-0 w-full py-3 px-4 pe-9 flex-1 text-sm rounded-lg focus-visible:ring-0 dark:bg-slate-900 dark:text-gray-400",
                    "optionTemplate": "<div class=\"flex items-center\"><div class=\"h-8 w-8 me-2\" data-icon></div><div><div class=\"text-sm font-semibold text-gray-800 dark:text-gray-200\" data-title></div><div class=\"text-xs text-gray-500\" data-description></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"flex-shrink-0 w-4 h-4 text-blue-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>"
                    }' class="hidden">
                    <option value="">Choose</option>
                    <option value="afghanistan" data-hs-select-option=''>
                        Afghanistan
                    </option>
                    <option value="india" data-hs-select-option=''>
                        India
                    </option>
                </select>

                <div class="absolute top-1/2 end-3 -translate-y-1/2">
                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                </div>
            </div>
            <!-- End Select -->
        </div>
        <div class="mt-6">
            <label class="text-gray-500 text-sm font-semibold">Meta Description</label>
            <x-textarea placeholder="Meta description" />
        </div>
    </section>
</form>

<script src="https://cdn.tiny.cloud/1/57naayre26zx3tkv995ze4azse6wr7wsrpl5mbyso422sp1v/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>