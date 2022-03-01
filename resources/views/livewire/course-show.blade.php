<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="/courses"> iTeach > </a>{{$modelId->name}}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <div>
                    <div>
                        Course Id: {{$modelId->id}} <br>
                        Course Name:{{$modelId->name}} <br>
                        Course Slug: {{$modelId->slug}} <br>
                        Course Description: {!!$modelId->description!!} <br>
                    </div>
                    <div x-data="{tab: window.location.hash ? window.location.hash : '#courseInfo'}" class="">
                        <div class="flex flex-row justify-between">

                            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
                               href="#" x-on:click.prevent="tab='#courseInfo'">
                                <span @popper(All the detail of the course)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>Course Info</a>

                            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
                               href="#" x-on:click.prevent="tab='#enrol'">
                                <span @popper(Learners in the course)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </span>Enrolments</a>

                            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
                               href="#" x-on:click.prevent="tab='#resources'">
                                <span @popper(Course shared resource feed)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                </span>Resource Feed</a>

                            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
                               href="#" x-on:click.prevent="tab='#livechat'">
                                <span @popper(Live Chat Sessions)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                    </svg>
                                </span>Live Chat</a>

                            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
                               href="#" x-on:click.prevent="tab='#discussion'">
                                <span @popper(Group Discussion Forums)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                      <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>Discussion</a>

                            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
                               href="#" x-on:click.prevent="tab='#gradebook'">
                                <span @popper(Learner assessments and results)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </span>Assessments</a>

                            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
                               href="#" x-on:click.prevent="tab='#calendar'">
                                <span @popper(Events listing)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </span>Calendar</a>

                        </div>



                        <div x-show="tab == '#courseInfo'" x-cloak>
                            <div class="p-2">
                            <ul class="block w-11/12 my-4 mx-auto" x-data="{selected:null}">
                                <li class="flex align-center flex-col">
                                    <h4 @click="selected !== 0 ? selected = 0 : selected = null"
                                        class="cursor-pointer px-5 py-3 bg-indigo-500 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3 rounded-t"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg><span @popper(Course Accreditation Information)>Accreditation</span></h4>
                                    <div x-show="selected == 0" class="border py-4 px-2">

                                        <p>This will have the course accreditation information</p>

                                    </div>
                                </li>
                                <li class="flex align-center flex-col">
                                    <h4 @click="selected !== 1 ? selected = 1 : selected = null"
                                        class="cursor-pointer px-5 py-3 bg-indigo-500 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                        <span @popper(Course Delivery Format)>Delivery</span></h4>
                                    <div x-show="selected == 1" class="border py-4 px-2">
                                        <p>This will have the course delivery information</p>
                                    </div>
                                </li>
                                <li class="flex align-center flex-col">
                                    <h4 @click="selected !== 2 ? selected = 2 : selected = null"
                                        :class="{'cursor-pointer px-5 py-3 bg-indigo-500 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3': true, 'rounded-b': selected != 2}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                        </svg>
                                        <span @popper(Course Asessments Overview)>Assessment</span></h4>
                                    <div x-show="selected == 2" :class="{'border py-4 px-2': true, 'rounded-b': selected == 2}">
                                        <p>This will have the course assessment information</p>
                                    </div>
                                </li>
                                <li class="flex align-center flex-col">
                                    <h4 @click="selected !== 3 ? selected = 3 : selected = null"
                                        :class="{'cursor-pointer px-5 py-3 bg-indigo-500 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3': true, 'rounded-b': selected != 3}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        <span @popper(Course info overview for iCommerce)>Showcase</span></h4>
                                    <div x-show="selected == 3" :class="{'border py-4 px-2': true, 'rounded-b': selected == 3}">
                                        <p>This will have the course showcase information</p>
                                    </div>
                                </li>
                                <li class="flex align-center flex-col">
                                    <h4 @click="selected !== 4 ? selected = 4 : selected = null"
                                        :class="{'cursor-pointer px-5 py-3 bg-indigo-500 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3': true, 'rounded-b': selected != 4}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                        <span @popper(Course Active Gradebook)>Gradebook</span></h4>
                                    <div x-show="selected == 4" :class="{'border py-4 px-2': true, 'rounded-b': selected == 4}">
                                        <p>This will have the course gradebook settings information</p>
                                    </div>
                                </li>
                                <li class="flex align-center flex-col">
                                    <h4 @click="selected !== 5 ? selected = 5 : selected = null"
                                        :class="{'cursor-pointer px-5 py-3 bg-indigo-500 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3': true, 'rounded-b': selected != 5}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span @popper(Course Costs Breakdown)>Costs</span></h4>
                                    <div x-show="selected == 5" :class="{'border py-4 px-2': true, 'rounded-b': selected == 5}">
                                        <p>This will have the course cost information</p>
                                    </div>
                                </li>
                                <li class="flex align-center flex-col">
                                    <h4 @click="selected !== 6 ? selected = 6 : selected = null"
                                        :class="{'cursor-pointer px-5 py-3 bg-indigo-500 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3': true, 'rounded-b': selected != 6}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                        </svg>
                                        <span @popper(Course Active eLearning>eLearning</span></h4>
                                    <div x-show="selected == 6" :class="{'border py-4 px-2': true, 'rounded-b': selected == 6}">
                                        <p>This will have the course elearning information</p>
                                    </div>
                                </li>
                            </ul>
                            </div>
                        </div>

                        <div x-show="tab == '#enrol'" x-cloak>
                            <div class="p-2">
                                <p>This should be the student enrolments</p>
                            </div>
                        </div>

                        <div x-show="tab == '#resources'" x-cloak>
                            <div class="p-2">
                                <p>This should be resources sharing timeline per group including links to assessments, post should have an expiration date?</p>
                            </div>
                        </div>

                        <div x-show="tab == '#livechat'" x-cloak>
                            <div class="p-2">
                                <p>This should be live session setup, tracking and engagements... Live chat session have a start and close widnow</p>
                            </div>
                        </div>

                        <div x-show="tab == '#discussion'" x-cloak>
                            <div class="p-2">
                                <p>This should be discussion forum management and access</p>
                            </div>
                        </div>

                        <div x-show="tab == '#gradebook'" x-cloak>
                            <div class="p-2">
                                <p>This should be the assessment listing, gradebook and certification</p>
                            </div>
                        </div>

                        <div x-show="tab == '#calendar' " x-cloak>
                            <div class="p-2">
                                <p>This should be all activities related to time listing</p>
                            </div>
                        </div>

                    </div>



                </div>

            </div>
        </div>
     </div>
</div>



