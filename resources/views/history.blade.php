@extends('layouts/blankLayout')

@section('title', 'Homepage')


@section('content')
    <x-navbar />

    <style>
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

        @media (max-width: 600px) {
            .image-zoomer {
                height: 350px;
                max-width: 100%;
            }

            .image-zoomer img {
                transition: transform 0.2s ease;
            }

            .image-zoomer:hover img {
                transform: scale(1.1);
            }
        }

        @media (max-width: 990px) {
            .image-zoomer {
                height: 600px;
                max-width: 100%;
            }

            .image-zoomer img {
                transition: transform 0.2s ease;
            }

            .image-zoomer:hover img {
                transform: scale(1.1);
            }
        }

        @media (max-width: 1024px) {
            .image-zoomer {
                height: 250px;
                max-width: 100%;
            }

            .image-zoomer img {
                transition: transform 0.2s ease;
            }

            .image-zoomer:hover img {
                transform: scale(1.1);
            }
        }

        .text-dark {
            text-align: justify;
            text-justify: inter-word;
        }
    </style>

    <div class="container-fluid mt-5 pt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 image-zoomer">
                <img src="https://lh3.google.com/u/1/d/15CxJ8awNDw8y8F340Mym5304N4tad862=w2352-h1352-iv1" class="image"
                    width="100" alt="malitbog-church" srcset="">
            </div>
            <div class="col-lg-4">
                <span class="text-dark">Malitbog, a town in the Philippines, was established in the 18th century by the
                    Spanish. The town was
                    divided into two barangays, one in Barangay Caaga and the other in Barangay Abgaom which werer ruled by
                    their respective chieftains, called "captines". The rivalry between the two barangays led to confusion
                    and
                    the name "MALITBOG" was given to established pueblo. In 1857, a baroque-style Roman Catholic Church was
                    built in the middle of the two barangays, with the demarcation line serving as the line. In 1862, a
                    "carcel"
                    was constructed to warn settlers from Moro pirate attacks. Malitbog was recoognized undere the
                    Muara.</span>
            </div>
        </div>
        <div class="mt-5 mx-lg-5 px-lg-5">
            <span class="text-dark">
                Law of 1893, Malitbog was reorganized under the Maura Law of 1893, which granted towns and provinces greater
                autonomy and the establishment of "tribunales municipals" and "junta provincial". The town's territorial
                limits covered 19 kilometers south of the Poblacion, including the island of Limasawa. During the American
                regime, Malitbog was recognized under Act No. 82, known as the Municipal Code, and the first Municipal
                President was Francisco Escaño. The town's Municipal Hall was later transferred to another private house. In
                1957, the Municipality of Padre Burgos was created, and 1969, several barrios to the north were transferred
                under the jurisdiction of the newly-created Municipality of Tomas Oppus.
            </span>
        </div>
    </div>
@endsection
