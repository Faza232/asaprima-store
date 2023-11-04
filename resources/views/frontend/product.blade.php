@extends('layout.main')
@section('container')
<!-- <div class="container mx-auto px-40">
<div class="mt-21">
    <h3 class="text-gray-600 text-2xl font-medium text-center mt-8">Product Categories</h3>
    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mt-6">
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
            <a href="link-to-instruments-category.html">
                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('cart/cat-1.jpg')"></div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">Instruments & Orthopedi​</h3>
                    <span class="text-gray-500 mt-2"></span>
                </div>
            </a>
        </div>
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
            <a href="link-to-implants-category.html">
                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('cart/cat-2.jpg')"></div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">Implants</h3>
                    <span class="text-gray-500 mt-2"></span>
                </div>
            </a>
        </div>
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
            <a href="link-to-general-instruments-surgical-category.html">
                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('cart/cat-3.jpg')"></div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">General Instruments Surgical</h3>
                    <span class="text-gray-500 mt-2"></span>
                </div>
            </a>
        </div>
    </div>
</div>
</div> -->

<!-- component -->
<!-- This is an example component -->
<div class="container mx-auto px-40">

<aside class="w-64" aria-label="Sidebar">
    <h1 class>KATEGORI</h1>
    <div class="px-3 py-4 overflow-y-auto rounded bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <!-- Menu Dropdown 1 -->
                <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example-1" data-collapse-toggle="dropdown-example-1">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Implants</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-example-1" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11">Spinal Implants</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11">Locking Plates And Screws</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11">Large Fragment Plates</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11">Small Fragment Plates</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11">Implants For Hip Fixation</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11">External Fixaters</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11">Arthroscopic Implants</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11">Maxilofacial Implants</a>
                    </li>
                </ul>
            </li>

            <li>
                <!-- Menu Dropdown 2 -->
                <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark:hover-bg-gray-700" aria-controls="dropdown-example-2" data-collapse-toggle="dropdown-example-2">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover-text-gray-900 dark-text-gray-400 dark-group-hover-text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Instruments : Orthopedi</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-example-2" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Basic Instruments</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Other Instruments</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Plaster Instruments</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Wire Instruments</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Spine Surgery Instruments</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Bone Holding Forceps</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Bone Lever / Retractors / Elevators / Osteotomes</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">A.M. Prosthesis Instruments</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">D.H.S / D.C.S. Instruments</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Radius / Ulna Nailing Instruments</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Maxilofacial Instruments</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">General Instruments</a>
                    </li>
                </ul>
            </li>

            <li>
                <!-- Menu Dropdown 3 -->
                <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700" aria-controls="dropdown-example-3" data-collapse-toggle="dropdown-example-3">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover-text-gray-900 dark-text-gray-400 dark-group-hover-text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>General Instruments Surgical</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-example-3" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Minor Basic Instrument Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Abdominal Gynecology Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Abdominal Hysterectomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Amputation Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Appendectomy And Hernia Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">AV-Shunt Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Bandage Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Basic Adult Surgery Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Basic Eye Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Basic Eye Surgery Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Basic Orthopedic Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Bladder Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Bowel Resection Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Cataract Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Chalazion Instruments Set</a>
                    </li>
                                        <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Circumsision Instruments Set</a>
                    </li>                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Colectomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Common Duct Instruments Set</a>
                    </li>
                                        <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Craniotomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Curettage Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Debridements Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Dilatation And Curette Instruments Set</a>
                    </li>
                                        <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Embryotomy Instruments Set</a>
                    </li>                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Ent Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Gastro Intestinal Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Gynaecology Instrument Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Hack Extra General Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Hechting Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Hemoroidectomy Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Herniotomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Hysterectomy Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Intubation Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Laminectomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Laparatomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Mastectomy Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Mastoidectomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Mayor Basic Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Mayor Orthopedi Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Minor Basic Instrument Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Minor Ear Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Myomectomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Nephrectomy Intruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Neurosurgery Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Obgyn Surgery Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Opthalmology Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Oral Surgery Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Pap Smear Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Partus Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Pediatric Surgery Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Plastic Surgery Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Policlinic Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Polypectomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Prostatectomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Prostatectomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Small Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Small Orthopedi Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Thoractomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11"> THT Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Thyroidectomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Tonsillectomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Tracheostomy Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Tympanoplasty Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Urology Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Vascular Instruments Set</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover-bg-gray-100 dark:text-white dark-hover-bg-gray-700 pl-11">Venae Section Instrument Set</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>


    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
</div>


<div class="relative m-3 flex flex-wrap mx-auto justify-center ">

    <div class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
      <div class="overflow-x-hidden rounded-2xl relative">
        <img class="h-40 rounded-2xl w-full object-cover" src="https://pixahive.com/wp-content/uploads/2020/10/Gym-shoes-153180-pixahive.jpg">
        <p class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70" fill="none" viewBox="0 0 24 24" stroke="black">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </p>
      </div>
      <div class="mt-4 pl-2 mb-2 flex justify-between ">
        <div>
          <p class="text-lg font-semibold text-gray-900 mb-0">Product Name</p>
          <p class="text-md text-gray-800 mt-0">$340</p>
        </div>
        <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none" viewBox="0 0 24 24" stroke="gray">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg>
        </div>
      </div>
    </div>

@endsection