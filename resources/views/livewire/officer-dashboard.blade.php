<div>
    <div>
        <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div
                class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <h5>
                        <span class="text-gray-900">عدد الزيارات :</span>
                        <span class="">{{ count($appointments) }}</span>
                    </h5>
                </div>
                <div
                    class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                    <button type="button" wire:click="toggleGuestForm"
                        class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">

                        زائر جديد
                        <svg class="h-3.5 w-3.5 ms-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg></button>
                </div>
            </div>
            <div wire:poll.visible.5s class="overflow-x-auto">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>

                            <th scope="col" class="px-4 py-3">#</th>
                            <th scope="col" class="px-4 py-3">الرتبة</th>
                            <th scope="col" class="px-4 py-3">الاسم</th>
                            <th scope="col" class="px-4 py-3">سبب الزيارة</th>
                            <th scope="col" class="px-4 py-3">وقت الوصول</th>
                            <th scope="col" class="px-4 py-3">عمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $appointment)
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </td>
                                <td
                                    class="text-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ asset('assets/images/ranks/' . $appointment->rank . '.png') }}"
                                        alt="Rank Image" class="w-auto h-10 mx-auto">
                                </td>

                                <th scope="row"
                                    class="flex justify-center items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                    {{ $appointment->name }}
                                </th>

                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($appointment->description)
                                        {{ $appointment->description }}
                                    @else
                                        <span
                                            class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">لا
                                            يوجد سبب</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{-- Using Carbon to make it human-readable in Arabic --}}
                                    {{ $appointment->created_at->diffForHumans() }}
                                </td>

                                <td class="px-4 py-2">
                                    <!-- Green Button -->
                                    <button data-popover-target="popover-green"
                                        class="text-green-500 hover:text-green-700" title="إجراء ناجح">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="currentColor">
                                            <path
                                                d="M70-438q-12-12-11.5-28T71-494q12-11 28-11.5t28 11.5l142 142 14 14 14 14q12 12 11.5 28T296-268q-12 11-28 11.5T240-268L70-438Zm424 85 340-340q12-12 28-11.5t28 12.5q11 12 11.5 28T890-636L522-268q-12 12-28 12t-28-12L296-438q-11-11-11-27.5t11-28.5q12-12 28.5-12t28.5 12l141 141Zm169-282L522-494q-11 11-27.5 11T466-494q-12-12-12-28.5t12-28.5l141-141q11-11 27.5-11t28.5 11q12 12 12 28.5T663-635Z" />
                                        </svg>
                                    </button>
                                    <div data-popover id="popover-green" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-32 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400"
                                        data-popover-placement="bottom">
                                        <div class="p-3 text-center">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">إتمام الزيارة</h3>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>

                                    <!-- Red Button -->
                                    <button data-popover-target="popover-red" class="text-red-500 hover:text-red-700"
                                        title="إلغاء الزيارة">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="currentColor">
                                            <path
                                                d="m480-424 116 116q11 11 28 11t28-11q11-11 11-28t-11-28L536-480l116-116q11-11 11-28t-11-28q-11-11-28-11t-28 11L480-536 364-652q-11-11-28-11t-28 11q-11 11-11 28t11 28l116 116-116 116q-11 11-11 28t11 28q11 11 28 11t28-11l116-116Zm0 344q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                        </svg>
                                    </button>
                                    <div data-popover id="popover-red" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-32 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400"
                                        data-popover-placement="bottom">
                                        <div class="p-3 text-center">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">إلغاء الزيارة</h3>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>

                                    <!-- Yellow Button -->
                                    <button data-popover-target="popover-yellow"
                                        class="text-yellow-500 hover:text-yellow-700" title="إعادة تنبيه">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="currentColor">
                                            <path
                                                d="M200-200q-17 0-28.5-11.5T160-240q0-17 11.5-28.5T200-280h40v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h40q17 0 28.5 11.5T800-240q0 17-11.5 28.5T760-200H200Zm280-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280ZM120-560q-17 0-28.5-13T82-603q8-75 42-139.5T211-855q13-11 29.5-10t26.5 15q10 14 8 30t-15 28q-39 37-64 86t-33 106q-2 17-14 28.5T120-560Zm720 0q-17 0-29-11.5T797-600q-8-57-33-106t-64-86q-13-12-15-28t8-30q10-14 26.5-15t29.5 10q53 48 87 112.5T878-603q2 17-9.5 30T840-560Z" />
                                        </svg>
                                    </button>
                                    <div data-popover id="popover-yellow" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-32 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400"
                                        data-popover-placement="bottom">
                                        <div class="p-3 text-center">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">إعادة تنبيه</h3>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                </td>

                            </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div dir="rtl">
        <!-- Main modal -->
        @if ($showGuestForm)
            <div class="fixed top-0 start-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
                    <div class="flex items-center justify-between p-4 border-b">
                        <h3 class="text-lg font-semibold">اضافة زائر جديد</h3>
                        <button wire:click="toggleGuestForm" class="text-gray-500 hover:text-gray-900">&times;</button>
                    </div>

                    <form wire:submit.prevent="saveGuest" class="p-4 space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium">الاسم</label>
                            <input type="text" id="name" wire:model="name"
                                class="w-full p-2 border rounded focus:outline-none focus:ring">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="rank"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">الرتبة</label>
                            <select id="rank" wire:model="rank"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="null"selected disabled>اختار الرتبة</option>
                                <option value="areef">عريف</option>
                                <option value="rakeeb">رقيب</option>
                                <option value="rakeebAwl">رقيب اول</option>
                                <option value="mosa3ed">مساعد</option>
                                <option value="mosa3edAwl">مساعد اول</option>
                                <option value="molazem">ملازم</option>
                                <option value="molazemAwl">ملازم اول</option>
                                <option value="nakeeb">نقيب </option>
                                <option value="ra2ed">رائد </option>
                                <option value="mokadem">مقدم </option>
                                <option value="akeed">عقيد </option>
                                <option value="3ameed">عميد </option>
                                <option value="lewa2">لواء</option>
                                <option value="faree2">فريق</option>
                            </select>
                            @error('rank')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium">سبب الزيارة</label>
                            <textarea id="description" wire:model="description" class="w-full p-2 border rounded focus:outline-none focus:ring"></textarea>
                            @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">تسجيل
                            الزيارة</button>
                    </form>
                </div>
            </div>
        @endif
    </div>

</div>
