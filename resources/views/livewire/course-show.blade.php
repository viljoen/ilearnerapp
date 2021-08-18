<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="/courses"> Courses > </a>{{$modelId->name}}
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
                    <div class="col-span-4">
                        {{-- Function for adding classGroup--}}
                        This is text text
                    </div>
                </div>

            </div>
        </div>
     </div>
</div>



