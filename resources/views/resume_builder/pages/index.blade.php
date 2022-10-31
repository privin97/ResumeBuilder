@extends('resume_builder.layouts.app')

@section('content')

    <div class="row g-0 text-center">

        <div class="col-md-5">    
            <div class='section-right'>
                <div class="title">
                    <h1>Resume Builder</h1>
                    <p>We help you to build your resume in a easily way :)</p>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class='section-center'>

                <!-- First Block -->
                <div class='create-button'>
                    <button id='create-resume' class='main-button'>Build</button>
                </div>

                <!-- Second Block -->
                <div class='education-record'>

                    <div class='title-form'>
                        <h5>Add Education Record</h5>
                    </div>

                    <div class='education-form' id='education-form'>
                        <label for="course">Name of Course</label>
                        <input type="text" placeholder='Course' name="course_of_education" id="course_of_education">

                        <label for="course">Place of Study</label>
                        <input type="text" placeholder='Place' name="place_of_education" id="place_of_education">

                        <label for="course">Start of Education</label>
                        <input type="date" placeholder='From' name="start_education" id="start_education">

                        <label for="course">Start of Education</label>
                        <input type="date" placeholder='To' name="end_education" id="end_education">
                        
                        <div class='education-buttons'>
                            <!-- <button>Add Education</button> -->
                            <button id='education-add'>Add</button>
                            <button id='education-next'>Next</button>
                        </div>
                    </div>
                </div>

                <!-- Third Block -->
                <div class='work-experience-record'>

                    <div class="title-form">
                        <h5>Add Work Experience Record</h5>
                    </div>

                    <div class='experience-form'>
                        <label for="course">Name of Employer</label>
                        <input type="text" placeholder='Employer Name' name="employer_name" id="employer_name">

                        <label for="course">Position</label>
                        <input type="text" placeholder='Position' name="work_position" id="work_position">
                        
                        <label for="course">Start of Work</label>
                        <input type="date" placeholder='From' name="start_work" id="start_work">

                        <label for="course">End of Work</label>
                        <input type="date" placeholder='To' name="end_work" id="end_work">
                        

                        <div class='experience-buttons'>
                            <!-- <button>Add Work Experience</button> -->
                            <button id='experience-previous'>Previous</button>
                            <button id='experience-add'>Add</button>
                            <button id='experience-submit'>Create Resume</button>
                        </div>
                    </div>
                
                </div>

                <!-- Fourth Block -->
                <div class='resume'>

                    <input id='resume-url' type="text">

                    <button onclick="reloadPage()" >New Resume</button>
                    <button onclick="copyText()" id='resume-copy'>Copy</button>

                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div class="section-left">
                <div class='preview-education' id='preview-education'>
                            
                </div>

                <div class='preview-experience' id='preview-experience'>

                </div>
            </div>
        </div>

    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<!-- Hide/Show Div -->
<script>
    $(document).ready(function (){
        $('.education-record').hide();
        $('.work-experience-record').hide();
        $('.resume').hide();
        $('.preview-education').hide();
        $('.preview-experience').hide();
    });

    $(document).on('click', '#create-resume', function () {
        $('.create-button').hide();
        $('.preview-education').show();
        $('.education-record').show();
    });

    $(document).on('click', '#education-next', function () {
        $('.education-record').hide();
        $('.preview-education').hide();
        $('.preview-experience').show();
        $('.work-experience-record').show();
    });

    $(document).on('click', '#experience-previous', function () {
        $('.work-experience-record').hide();
        $('.preview-experience').hide();
        $('.preview-education').show();
        $('.education-record').show();
    });

    $(document).on('click', '#experience-submit', function () {
        $('.work-experience-record').hide();
        $('.preview-experience').hide();
        $('.resume').show();
    });
</script>

<!-- Add Education Record -->
<script>
    $(document).on('click', '#education-add', function () {
        addToServerEducation();
    });


    function addToServerEducation() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ URL::to('addeducation') }}",
            type: 'POST',
            data: {
                course_of_education : $("#course_of_education").val(),
                place_of_education : $("#place_of_education").val(),
                start_of_education : $("#start_education").val(),
                end_of_education : $("#end_education").val(),
            },
            success: function(data) {
                console.log(JSON.stringify(data));
                retreiveDataEducation();
            }
        });
    }

    function retreiveDataEducation() {
        $.ajax({
            type: 'GET',
            url: "{{ URL::to('geteducation') }}",
            dataType: "json",
            success: function(result) {

                clearEducation();

                $count = result.length;

                $("#preview-education").empty().append('');
                
                for (var i = 0; i < $count; i++){

                    $("#preview-education").append(
                        '<h1>' + result[i]['course_of_education'] + '</h1>'
                        + '<button onClick="deleteDataEducation(' + result[i]['id'] + ')">delete</button>'
                    );
                }
                
            }
        });
    }

    function deleteDataEducation($id) {
        $.ajax({
            type: 'GET',
            url: "{{ URL::to('deleteeducation') }}" + '/' + $id,
            success: function(result) {
                retreiveDataEducation();
            }
        });
        // alert();
    }
</script>

<!-- Add Work Experience Record -->
<script>
    $(document).on('click', '#experience-add', function () {
        addToServerExperience();
    });

    function addToServerExperience() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ URL::to('addexperience') }}",
            type: 'POST',
            data: {
                name_of_employer : $("#employer_name").val(),
                position_of_job : $("#work_position").val(),
                start_of_employer : $("#start_work").val(),
                end_of_employer : $("#end_work").val(),
            },
            success: function(result) {
                var data = JSON.parse(JSON.stringify(result));

                $session = data['url'];

                $url = '{{url("resume")}}' + '/' + $session;

                $('#resume-url').val($url);

                retreiveDataExperience();
            }
        });
    }

    function retreiveDataExperience() {
        $.ajax({
            type: 'GET',
            url: "{{ URL::to('getexperience') }}",
            dataType: "json",
            success: function(result) {

                clearExperience();

                $count = result.length;

                console.log($count);

                $("#preview-experience").empty().append('');
                
                for (var i = 0; i < $count; i++){
                    $("#preview-experience").append(
                        '<h1>' + result[i]['name_of_employer'] + '</h1>'
                        +  '<button onClick="deleteDataExperience(' + result[i]['id'] + ')">delete</button>'
                    );
                }
                
            }
        });
    }

    function deleteDataExperience($id) {
        $.ajax({
            type: 'GET',
            url: "{{ URL::to('deleteexperience') }}" + '/' + $id,
            success: function(result) {
                retreiveDataExperience();
            }
        });
        // alert();
    }

</script>

<!-- Copy and Reload -->
<script>
    function copyText() {
        var textBox = document.getElementById("resume-url");
        textBox.select();
        document.execCommand("copy");
    }

    function reloadPage() {
        location.reload(); 
    }
</script>

<!-- Clear Input Field -->
<script>
    function clearEducation() {
        $('#course_of_education').val('');
        $('#place_of_education').val('');
        $('#start_education').val('');
        $('#end_education').val('');
    }

    function clearExperience() {
        $('#employer_name').val('');
        $('#work_position').val('');
        $('#start_work').val('');
        $('#end_work').val('');
    }
</script>