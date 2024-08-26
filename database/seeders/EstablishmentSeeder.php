<?php

namespace Database\Seeders;

use App\CategoryEnum;
use App\Models\Establishment;
use App\Models\Image;
use App\Models\Review;
use App\Models\User;
use App\StatusEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        $sto_nino = Establishment::create([
            'name' => 'Sto. Niño de Malitbog Church',
            'owner_id' => $user->id,
            'address' => 'Taliwa, Malitbog, Southern Leyte',
            'description' => "Built in 1857, during the Spanish colonial era, this church is among the oldest in the province. This church draws a lot of pilgrims who come to pray and enjoy the serene, spiritual atmosphere. The church's architecture, which emphasizes the town's rich history and culture, is another striking feature.",
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => '125.00094211920187',
            'geolocation_latitude' => '10.158163827849396',
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::RELIGIOUS_SITE
        ]);

        Image::insert([
            [
                'establishment_id' => $sto_nino->id,
                'name' => 'Cover',
                'path' => 'https://lh3.google.com/u/0/d/1hQnbHdQ-Mq-Z6fMce4i__Hrq1EYpGfYS=w1682-h1035-iv1',
                'is_cover' => true,
            ],
            [
                'establishment_id' => $sto_nino->id,
                'name' => 'Sto Nino',
                'path' => 'https://lh3.google.com/u/0/d/1Spx6rr-TuVF1jvXKLPIsUCGYlg0j-dv1=w1682-h1035-iv1',
                'is_cover' => false,
            ],
            [
                'establishment_id' => $sto_nino->id,
                'name' => 'Sto Nino',
                'path' => 'https://lh3.google.com/u/0/d/1i5VacJW-dPRH93n_zzs-TqQKZn6Zt_b0=w1682-h1035-iv1',
                'is_cover' => false,
            ],
        ]);

        Establishment::create([
            'name' => 'Casa Escaño Ruins',
            'owner_id' => $user->id,
            'address' => 'Pasil, Malitbog, Southern Leyte',
            'description' => "Casa Escaño Ruins: Once a well-known landmark in Malitbog with a commanding view of picturesque Sogod Bay, the magnificent residential building occupied a vast block. The sailors were drawn to it when it was painted white. Premium Philippine hardwood made up the upper story, and thick coral stone in the style of Spanish colonial homes was used to build the lower portion",
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => 124.9918280967686,
            'geolocation_latitude' =>  10.162625521337047,
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::RELIGIOUS_SITE
        ]);

        Establishment::create([
            'name' => 'Hijos de F. Escaño Wooden Wharf  Ruins ',
            'owner_id' => $user->id,
            'address' => 'Pasil, Malitbog, Southern Leyte',
            'description' => "Fernando orchestrated a shipment of hemp, sugar, and other agricultural products for the port of Cebu, originating from Malitbog and other gathering points in Leyte. The Escaño vessels returned to Leyte with a variety of goods, including consumer and household items, to sell in the towns of Leyte from Cebu. Fernando built the pier for his ships at his Malitbog headquarters.",
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => 124.99272843779909,
            'geolocation_latitude' => 10.162742115327136,
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::CULTURAL_SITE
        ]);

        Establishment::create([
            'name' => 'Caaga Watchtower',
            'owner_id' => $user->id,
            'address' => 'Caaga, Malitbog, Southern Leyte',
            'description' => 'Standing sentinel for over two centuries, a pair of watchtowers, known as "baluartes," flank the historic Roman Catholic Church in Malitbog.  Constructed in 1820, one baluarte stands proudly in Barangay Caaga, south of the town center (poblacion), while its counterpart guards the north side from Barangay Abgao.  These equidistant watchtowers were built during a time when vigilance was paramount, serving as silent testaments to Malitbogs rich history.',
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => '125.0123',
            'geolocation_latitude' => '10.1181',
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::CULTURAL_SITE
        ]);

        $escano_mauso = Establishment::create([
            'name' => 'Escaño Mausoleum',
            'owner_id' => $user->id,
            'address' => 'Cabul-anonan, Malitbog, Southern Leyte',
            'description' => 'This is one of the few remaining fully intact European-style-inspired mausoleums in the country, built in 1928. A landmark in a Catholic cemetery owned by the Escaño family.',
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => '125.0143',
            'geolocation_latitude' => '10.1190',
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::CULTURAL_SITE
        ]);

        Image::insert([
            [
                'establishment_id' => $escano_mauso->id,
                'name' => 'Cover',
                'path' => 'https://lh3.google.com/u/0/d/1PfjRtMa5AHnDbWgMxsZP08T_8jBOt4N6=w3026-h2210-iv1',
                'is_cover' => true,
            ],
            [
                'establishment_id' => $escano_mauso->id,
                'name' => 'Sto Nino',
                'path' => 'https://lh3.google.com/u/0/d/1X_86Ga1YCPb885mNq_fEgi_ZTotVKehx=w2026-h2210-iv1',
                'is_cover' => false,
            ],
            [
                'establishment_id' => $escano_mauso->id,
                'name' => 'Sto Nino',
                'path' => 'https://lh3.google.com/u/0/d/1X_86Ga1YCPb885mNq_fEgi_ZTotVKehx=w2026-h2210-iv1',
                'is_cover' => false,
            ],
        ]);

        Establishment::create([
            'name' => 'Carcel Municipal de Malitbog',
            'owner_id' => $user->id,
            'address' => 'Taliwa, Malitbog, Southern Leyte',
            'description' => "Malitbog's historic police station near the sea, boasts a rich past.  Built in 1862, this building originally served as the town's Casa Consistorial, or Municipal Council House.  Spanish inscriptions near the top of the facade speak of renovations in 1910 and 1953, hinting at the building's enduring role in Malitbog's administration.",
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => 125.0030881438507,
            'geolocation_latitude' => 10.16466914320579,
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::CULTURAL_SITE
        ]);

        Establishment::create([
            'name' => 'Image of Santo Niño de Malitbog',
            'owner_id' => $user->id,
            'address' => 'Taliwa, Malitbog, Southern Leyte',
            'description' => "The venerated image of Santo Niño de Malitbog is a wooden image of the Child Jesus patterned after the famed image of Santo Niño de Cebu, with its petite size, curly hair, big eyes, cute smile, plump cheeks, his right hand in a manner of blessing and a scepter hanging on it, and his left hand holding a Globus crucifer, a symbol of power over his dominion. The image stands on a simple yet beautifully decorated base. The image is also similar to that of Santo Niño de Cebu: a white robe, a red cape, a set of jewels, and a crown, among others. Fr. Mark Vincent Salang, the diocese’s chancellor, said local accounts believe that Malitbog Santo Nino was crafted by local artisans in the 1720s “to be a replica of Cebu’s Santo Nino.",
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => 125.00087632262617,
            'geolocation_latitude' => 10.157927231722747,
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::CULTURAL_SITE
        ]);

        Establishment::create([
            'name' => 'New Katipunan Cave',
            'owner_id' => $user->id,
            'address' => 'New Katipunan, Malitbog, Southern Leyte',
            'description' => "There were numerous bamboo trees at the cave's entrance, serving to conceal it. The entrance to the cave is quite large; it is thought to be 20 feet long and 12 feet broad. The walls of the cave were adorned with jagged stalactites, stalagmites, and spikey-looking rocks that defied human imagination. These formations were the result of countless water drips that formed like spiky fingers. We could hear the whispering of the cave's resident bats as we ventured deeper within. An elderly resident claimed that during the Japanese war, the guerillas temporarily took up residence in the cave.",
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => 124.9321287899463,
            'geolocation_latitude' => 10.223105882413307,
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::CULTURAL_SITE
        ]);

        Establishment::create([
            'name' => 'Bun-ot River',
            'owner_id' => $user->id,
            'address' => 'Maningning, Malibog, Southern Leyte',
            'description' => "This hidden waterway is more than just a scenic wonder. It's a haven for the adventurous spirit. The cool, inviting water beckons swimmers, promising a refreshing escape from the summer heat. For those seeking a more active experience, the gentle current provides the perfect playground for kayaking. As you paddle downstream, the forest unfolds around you, its symphony of birdsong and rustling leaves a constant companion.",
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => 124.93382571924832,
            'geolocation_latitude' => 10.178005921933597,
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::CULTURAL_SITE
        ]);

        Establishment::create([
            'name' => 'Toril Peak',
            'owner_id' => $user->id,
            'address' => 'Juangon, Malitbog, Southern Leyte',
            'description' => 'Tucked away in Barangay Juangon, Malitbog, Southern Leyte, lies a hidden gem known to locals as "the little Batanes." This stunning mountain terrain, accessible only by foot, bike, a trek, or an exhilarating ATV ride, offers an adventure unlike any other.',
            'mode_of_transportation' => 'walking,motorcycle',
            'geolocation_longitude' => '125.0141',
            'geolocation_latitude' => '10.1427',
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::ADVENTURE_SPOT
        ]);

        Establishment::create([
            'name' => 'Timba Falls',
            'owner_id' => $user->id,
            'address' => 'Timba, Malitbog, Southern Leyte',
            'description' => "Just a refreshing 15-minute jaunt off the highway, nestled within Barangay Timba, lies a secret local haven: a cascading waterfall. This isn't your grand, thundering falls, but a small slice of paradise perfect for a quick dip and a deep breath of fresh air. For the locals, this hidden gem serves as a natural swimming hole, a welcome respite from the heat. Whether you're seeking a cool down after a scenic drive or an invigorating climb, this little waterfall offers a delightful escape right on your doorstep.",
            'mode_of_transportation' => 'walking,motorcycle',
            'geolocation_longitude' => 124.97172576549485,
            'geolocation_latitude' => 10.195250673007163,
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::ADVENTURE_SPOT
        ]);

        Establishment::create([
            'name' => 'Hopia Malitboganon',
            'owner_id' => $user->id,
            'address' => 'Taliwa, Malitbog, Southern Leyte',
            'description' => 'Dive into a taste of tradition with Malitbogs very own hopia! This Southern Leyte delicacy boasts a simple yet soul-satisfying filling of caramelized muscovado sugar. But what truly sets it apart is its heritage. The recipe, passed down through generations, remains unchanged, using the same time-tested ingredients and the same "pugon" oven – a testament to the enduring spirit of Malitbogs culinary traditions. Each bite is a delicious journey back in time, a taste of authenticity that will tantalize your sweet tooth.',
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => 125.0144,
            'geolocation_latitude' => 10.1156,
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::RESTAURANT
        ]);

        Establishment::create([
            'name' => 'Malitbog Public Plaza',
            'owner_id' => $user->id,
            'address' => 'Taliwa, Malitbog, Southern Leyte',
            'description' => "Beneath the sprawling canopy of centuries-old acacia trees lies the heart of Malitbog: a vibrant public square pulsating with local life. Here, the ground gives way to a welcoming open space where the community gathers to celebrate its rich heritage. The air thrums with excitement during the renowned Himug-usa Festival, a vibrant display of cultural performances and lively music. Witness the Kaplag-uli Festival, a unique spectacle showcasing the town's agricultural bounty. And come nightfall, immerse yourself in the Pasundayag sa Malitbog, a dazzling display of local talent and artistry. This central square is more than just a place; it's a testament to Malitbog's enduring spirit and a stage for its captivating cultural tapestry.",
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => 125.00153180782169,
            'geolocation_latitude' => 10.158586924210933,
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::ENTERTAINMENT_VENUE
        ]);

        Establishment::create([
            'name' => 'Porla Bahia de Malitbog Beach Resort',
            'owner_id' => $user->id,
            'address' => 'Sto. Nino, Malitbog, Southern Leyte',
            'description' => "Imagine waking up to the sound of gentle waves lapping at the shore, spending your days lounging by the pool, or exploring the vibrant coral reefs offshore. Porla Bahia de Malitbog beach resort typically boasts clean accommodations, delicious on-site dining, and access to the beautiful sea, all at an affordable price tag.",
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => 124.983238078986,
            'geolocation_latitude' => 10.194799278913433,
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
            'hours_of_operation' => 'Everyday',
            'category' => CategoryEnum::ACCOMMODATION
        ]);


    }
}
