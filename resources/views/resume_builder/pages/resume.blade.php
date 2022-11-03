<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Resume</title>

    <link rel="stylesheet" href="{{ asset('resume_builder') }}/resume.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    <div class="row g-0 text-center">

        <div class="col-md-6"> 
            <div class="section-one">
                <div class="education">
                    <h1>Education <a>History</a></h1>
                    @foreach($education as $data)
                    <p id='course_education'>{{ $data->course_of_education }}</p>
                    <p id='place_education'>{{ $data->place_of_education }}</p>
                    <p id='date_education'>{{ $data->start_of_education }} / {{ $data->end_of_education }}</p>
                    <br><hr>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-6"> 
            <div class="section-two">
                <div class="experience">
                    <h1>Work <a>Experience</a></h1>
                    @foreach($experience as $data)
                    <p id='name_employer'>{{ $data->name_of_employer }}</p>
                    <p id='position_employer'>{{ $data->position_of_job }}</p>
                    @if($data->present == 'true')
                        <p id='date_employer'>{{ $data->start_of_employer }} / Present</p>
                    @else
                        <p id='date_employer'>{{ $data->start_of_employer }} / {{ $data->end_of_employer }}</p>
                    @endif
                    <br><hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>