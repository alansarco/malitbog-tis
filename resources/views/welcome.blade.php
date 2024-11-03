@extends('layouts/blankLayout')

@section('title', 'Homepage')


@section('content')
    <x-navbar />

    <style>
        .bg-image {
            background-image: url('https://southernleyte.gov.ph/wp-content/uploads/2022/10/STO.-NINO-CHURCH.jpg');
            /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            height: 65vh;
        }

        .welcome-text {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
    </style>

    <div class="container-fluid bg-image d-flex flex-column justify-content-center align-items-center">
        <h4 class="welcome-text">Republic of the Philippines</h1>
            <h1 class="welcome-text">Municipality of Malitbog</h1>
    </div>

    <div class="container-fluid row justify-content-center align-items-center p-5 mx-5 gap-4">
        <div class="col-lg-4">
            <h5 class="text-dark text-center">VISION</h5>
            <span>A CENTER OF ARTS AND CULTURE IN THE PROVINCE OF SOUTHERN LEYTE, WITH A PROGRESSIVE SUSTAINABLE, AND
                DIVERSE ECONOMY, DISASTER-RESILIENT COMMUNITY, STRENGENED SOCIAL ORGANIZATIONS AND EMPOWERED CITIZENRY
                LIVING IN AN ECOLOGICALLY BALANCED, SAFE, PEACEFUL AND ATTRACTIVE ENVIRONMENT WITH A COMPETENT, TRANSPARENT,
                ACCOUNTABLE AND RESPONSIVE GOVERNANCE.</span>
        </div>
        <div class="col-lg-4">
            <h5 class="text-dark text-center ">MISSION</h5>
            <span>THE MUNICIPALITY WILL PROVIDE A HOLISTIC AND SUSTAINABLE SOCIO-ECONOMIC PROGRAMS AND SOCIAL SERVICES THAT
                WILL CONTRIBUTE TO THE IMPROVEMENT OF THE QUALITY OF LIFE OF IT'S CONSTITUENTCY, PROMOTE CONCERNS FOR AN
                ECOLOGICALLY BALANCED THROUGH PRESERVATION AND CONSERVATION, ENFORCE PEACE AND ORDER FOR A JUST AND HUMANE
                SOCIAL ORDER AND NURTURE PEOPLE EMPOWERMENT THRU STRENGTHENED SOCIAL ORGANIZATION UNDER AND EFFICIENT
                QUALITY LEADERSHIP.</span>
        </div>
    </div>
@endsection
