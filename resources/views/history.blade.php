@extends('layouts/blankLayout')

@section('title', 'History')

@section('content')
    <x-navbar />

    <style>
        /* Background styling with Marble and Skyblue effect */
        .background-section {
            background: linear-gradient(45deg, #1e90ff, #ff6347, #1e90ff), url('{{ asset("assets/img/background/malitbog-background.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 0;
            position: relative;
        }


        /* Content styling to appear above the overlay */
        .background-content {
            padding: 0 2rem;
            padding-top: 2rem;
            padding-bottom: 2rem;
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.8);
        }

        /* Image zoom effect */
        .image-zoomer {
            overflow: hidden;
            height: 600px;
            position: relative;
        }

        .image-zoomer img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .image-zoomer:hover img {
            transform: scale(1.2);
        }

        /* Responsive styling for text */
        .text-dark {
            text-align: justify;
            text-justify: inter-word;
        }

        .large-text {
            font-size: 1.5rem;
            line-height: 1.5;
        }
        p {
            text-indent: 2rem;
        }
    </style>

    <div class="container-fluid background-section">
        <!-- Main Content with Background -->
        <div class="background-content">
            <h1 style="font-family: 'Charm', cursive; font-weight: 700; ">History of Malitbog</h1>
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8">
                    <!-- Start of Carousel with Continuous Slide Effect -->
                    <div id="imageCarousel" class="carousel slide carousel-3d" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img  src="{{ asset('assets/img/elements/church.jpg') }}" height="450" class="d-block w-100" alt="Malitbog Church">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/elements/dance.jpg') }}" height="450" class="d-block w-100" alt="Second Image">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/elements/santo.jpg') }}" height="450" class="d-block w-100" alt="Third Image">
                            </div>
                        </div>
                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Text Section with Background -->
            <div class="container-fluid mt-5 pt-5">
                <div class="row justify-content-center align-items-start mt-5 pt-5">
                    <div class="col-lg-7">
                        <img src="{{ asset('assets/img/elements/dance.jpg') }}" class="img-fluid" alt="Malitbog Church">
                    </div>
                    <div class="col-lg-5">
                        <p class="text-dark large-text" style="font-family: Georgia, serif;">
                            Malitbog, a town in the Philippines, was established in the 18th century by the Spanish. The town was divided into two barangays, one in Barangay Caaga and the other in Barangay Abgaom, which were ruled by their respective chieftains, called "captines." The rivalry between the two barangays led to confusion, and the name "MALITBOG" was given to the established pueblo. In 1857, a baroque-style Roman Catholic Church was built in the middle of the two barangays, with the demarcation line serving as the line. In 1862, a "carcel" was constructed to warn settlers from Moro pirate attacks. Malitbog was recognized under the Muara.
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center my-5">
                    <p class="col-12 text-dark large-text" style="font-family: Georgia, serif;">
                        Under the Law of 1893, Malitbog was reorganized under the Maura Law of 1893, which granted towns and provinces greater autonomy and the establishment of "tribunales municipals" and "junta provincial." The town's territorial limits covered 19 kilometers south of the Poblacion, including the island of Limasawa. During the American regime, Malitbog was recognized under Act No. 82, known as the Municipal Code, and the first Municipal President was Francisco Escaño. The town's Municipal Hall was later transferred to another private house. In 1957, the Municipality of Padre Burgos was created, and in 1969, several barrios to the north were transferred under the jurisdiction of the newly-created Municipality of Tomas Oppus.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
