<?php

namespace App;

enum CategoryEnum : string
{
    case RESTAURANT = 'Restaurant';
    case PARK = 'Park';
    case MUSEUM = 'Museum';
    case SHOPPING_CENTER = 'Shopping Center';
    case HISTORICAL_SITE = 'Historical Site';
    case BEACH = 'Beach';
    case NATURAL_ATTRACTION = 'Natural Attraction';
    case ENTERTAINMENT_VENUE = 'Entertainment Venue';
    case CULTURAL_SITE = 'Cultural Site';
    case RELIGIOUS_SITE = 'Religious Site';
    case ADVENTURE_SPOT = 'Adventure Spot';
    case ACCOMMODATION = 'Accommodation';
    case WELLNESS_CENTER = 'Wellness Center';
    case SPORTS_RECREATION = 'Sports and Recreation Facility';
}
