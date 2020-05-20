<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel-Vue!</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>

{{--<div>--}}
{{--    <h1>Existing Projects</h1>--}}
{{--        @forelse($projects as $project)--}}
{{--            <p>{{$project->project_name}} and {{$project->project_desc}}</p>--}}
{{--        @empty--}}
{{--            <p>No Projects!</p>--}}
{{--        @endforelse--}}
{{--</div>--}}

<div id="root2">

    <form method="POST" action="{{route('vue.projects.store')}}"
          @keydown="form.error_data.clear_input($event.target.name)" @submit.prevent="submit_now">
        <div>
            <label for="project_name"> Project Name
                <input  class="form-control" value="{{old('project_name')}}" name="project_name"
                        v-model="form.project_name" type="text" placeholder="Project Name">
            </label>
             <p style="color:red" v-if="form.error_data.has('project_name')" v-text="form.error_data.get('project_name')"></p>
        </div>
        <div>
            <label for="project_desc">Project Description
                <input class="form-control" value="{{old('project_desc')}}"
                        name="project_desc" v-model="form.project_desc" type="text" placeholder="Project Description">
            </label>

             <p style="color:red" v-if="form.error_data.has('project_desc')" v-text="form.error_data.get('project_desc')" ></p>

        </div>
        <div>
            <button class="btn" style="background-color: #2a9055" type="submit" :disabled="form.error_data.any_errors()">Create</button>
        </div>

    </form>

</div>

</body>

<script src="/js/root2.js"></script>

</html>
