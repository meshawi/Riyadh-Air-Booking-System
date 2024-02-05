<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horizontal Scrollable & Draggable Tab Navigation Menu | With Tab Content - Html, Css & Javascript</title>
  <!--========== Main Style sheet ==========-->
  <link rel="stylesheet" href="style.css">
  <!--========== Unicons iconscout ==========-->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- =============== GLOBAL FONT =============== -->
  <link rel="stylesheet" href="../../assets/css/globalFont.css">
</head>

<body>
  <!-- =============== Include navbar  =============== -->

  <?php
  include '../../assets/Inc_files/INC_NAV_forAccessories.php';
  ?>
  <section class="main-container">

    <div class="tab-nav-bar">
      <div class="tab-navigation">
        <i class="uil uil-angle-left left-btn"></i>
        <i class="uil uil-angle-right right-btn"></i>
        <ul class="tab-menu">
          <li class="tab-btn active">Riyadh</li>
          <li class="tab-btn">Dammam</li>
          <li class="tab-btn">Jeddah</li>
          <li class="tab-btn">Abha</li>
          <li class="tab-btn">Jizan</li>
          <li class="tab-btn">Medina</li>
          <li class="tab-btn">Najran</li>
          <li class="tab-btn">Tabuk</li>
          <li class="tab-btn">Taif</li>
          <li class="tab-btn">Yanbu</li>
          <li class="tab-btn">Al-Baha</li>
        </ul>
      </div>
    </div>

    <div class="tab-content">
      <!--start-->
      <div class="tab active">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Mansard.avif" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Mansard Riyadh</h2>
              <div class="description">
                <p>Welcome to a hotel designed to inspire the imagination, rekindle the spirit, and awaken the senses.
                  Mansard Riyadh, A Radisson Collection Hotel caters to the needs and whims of our valued guests.
                  Whether staying in our guest rooms, serviced apartments, or long-stay villas, enjoy access to 24-hour
                  room service, our spa and ﬁtness center, and housekeeping twice a day. </p>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Ritz.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">The Ritz-Carlton®</h2>
              <div class="description">
                <p>Located next to the King Abdulaziz Convention Center, the luxurious Ritz-Carlton hotel in Riyadh
                  features interiors with arched doorways and marble corridors. It features 6 restaurants, an indoor
                  pool and spacious rooms equipped with an iPod dock. There is free Wi-Fi access in public areas.</p>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Movenpick.jpeg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Mövenpick Hotels & Resorts</h2>
              <div class="description">
                <p>Located in Riyadh, 2.8 miles from Riyadh Gallery Mall, Movenpick Hotel and Residences Riyadh provides
                  accommodations with an outdoor swimming pool, free private parking, a fitness center and a garden. The
                  property features a bar, as well as a restaurant serving Italian cuisine. The property has a 24-hour
                  front desk, airport transportation, a shared lounge and free WiFi.
                </p>

              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Riyadh</h1>
      </div>
      <!--end-->
      <div class="tab">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Sheraton.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Sheraton Dammam Hotel</h2>
              <div class="description">
                <p>This 5-star deluxe hotel in the heart of Dammam's business district features a luxurious wellness
                  center and several pools. 3 restaurants and a lounge bar offer varied dining opportunities.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Barira.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Braira Al Dammam</h2>
              <div class="description">
                <p>Located in Dammam, 12 miles from Dhahran Expo, Braira Al Dammam provides accommodations with a
                  fitness center, free private parking, a shared lounge and a restaurant. This 4-star hotel offers room
                  service, a 24-hour front desk and free WiFi. Guests can have a drink at the snack bar.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Marriott.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Residence Inn by Marriott Dammam</h2>
              <div class="description">
                <p>Located in Dammam, 11 miles from Dhahran Expo, Residence Inn by Marriott Dammam has accommodations
                  with an outdoor swimming pool, free private parking, a fitness center and a shared lounge. This 4-star
                  hotel offers room service and a 24-hour front desk. Guests can enjoy Middle Eastern and International
                  dishes at the restaurant or have a drink at the snack bar.</p>
              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Dammam</h1>
      </div>
      <!--end-->
      <div class="tab">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Hilton.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Jeddah Hilton</h2>
              <div class="description">
                <p>Overlooking Jeddah Corniche and the Red Sea, this 5-star Hilton features 5 dining outlets, 11
                  flexible meeting rooms and a health club with 2 pools. Free WiFi is available in the lobby.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/The Venue.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">The Venue Jeddah Corniche</h2>
              <div class="description">
                <p>The 5-star Venue Jeddah Corniche hotel is placed in the heart of Jeddah overlooking the beautiful Red
                  Sea Riviera waterfront. Located only at a 15-minute away from the world’s tallest fountain, King
                  Fahd’s fountain. A shopping adventure lies within 5-minute away at the Red-Sea mall, 20 minutes away
                  from UNESCO World Heritage site of Al-Balad on the historical downtown. Located within walking
                  distance from a playful water park, The-Beach.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/SwissotelLiving.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Swissotel Living Jeddah</h2>
              <div class="description">
                <p>Located in Jeddah, 2.5 miles from Jeddah Mall, Swissotel Living Jeddah has accommodations with an
                  outdoor swimming pool, free private parking, a fitness center and a restaurant. Each room at the
                  5-star hotel has city views, and guests can enjoy access to a sauna and a hot tub. The property
                  provides a 24-hour front desk, airport transportation, room service and free WiFi.</p>
              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Jeddah</h1>
      </div>
      <!--end-->
      <div class="tab">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Citadines.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Citadines Abha</h2>
              <div class="description">
                <p>Citadines Abha offers a sauna and free private parking, and is within 3.3 miles of Al Sa'ada Park and
                  6.3 miles of King Khalid University. Among the facilities of this property are a restaurant, a 24-hour
                  front desk, and an elevator, along with free Wifi throughout the property. The condo hotel features an
                  outdoor swimming pool, hot tub, and full-day security. Accommodations for disabled guests are also
                  available.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Sarwat.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Sarwat Park Hotel</h2>
              <div class="description">
                <p>Located in Abha, 984 feet from Abu Khayal Garden Park, Sarwat Park Hotel has a restaurant, a fitness
                  center and a terrace. Popular points of interest nearby include Muftaha Palace Museum, Muftaha Palace
                  Theater and Reservoir Park. Free WiFi is available and Abha Palace Theme Park is 1.2 mi away.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Aber.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Aber</h2>
              <div class="description">
                <p>Aber is located in Khamis Mushayt, within 4.7 miles of Al Sa'ada Park and 7.7 miles of King Khalid
                  University. With free WiFi, this 4-star hotel offers room service and a 24-hour front desk. The hotel
                  has a hammam and a concierge service.

                  À la carte and continental breakfast options are available each morning at the hotel.
                </p>
              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Abha</h1>
      </div>
      <!--end-->
      <div class="tab">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/GrandMillennium.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Grand Millennium Jizan</h2>
              <div class="description">
                <p>Located in Jazan, 1.2 miles from Jizan University, Grand Millennium Gizan provides accommodations
                  with an outdoor swimming pool, free private parking, a fitness center and a garden. Providing a
                  restaurant, the property also features a bar, as well as an indoor pool and a sauna. The property has
                  room service, a 24-hour front desk and currency exchange for guests.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/GrandPlazaHotel.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Grand Plaza Hotel - Jizan</h2>
              <div class="description">
                <p>Located 2.2 miles from Al Khazzan Park, Grand Plaza Hotel - Jazan offers 4-star accommodations in
                  Jazan and has a garden. Among the facilities of this property are a restaurant, room service and a
                  24-hour front desk, along with free WiFi throughout the property. The hotel features family rooms.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Radisson Blu Resort Jizan.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Radisson Blu Resort Jizan</h2>
              <div class="description">
                <p>Offering an outdoor pool and a restaurant, Radisson Blu Resort Jizan is located in Jāzān. Free WiFi
                  access is available. Rooms here will provide you with air conditioning, a mini-bar and a seating area.
                  Featuring a shower, private bathrooms also come with a hairdryer and free toiletries. Extras include a
                  sofa, a safety deposit box and bed linen.
                </p>
              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Jizan</h1>
      </div>
      <!--end-->
      <div class="tab">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Emaar Al Mektan Hotel.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Emaar Al Mektan Hotel </h2>
              <div class="description">
                <p>Just a 1230 feet' walk from the holy Prophets Mosque, Emaar Al Mektan Hotel is located in Medina.
                  Free WiFi is available in the public areas. It offers a restaurant with a 24-hour room service and a
                  gift shop. All rooms at Emaar Al Mektan are decorated in warm and elegant tones.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Madinah Hilton Hotel.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Madinah Hilton Hotel</h2>
              <div class="description">
                <p>The Madinah Hilton Hotel is located only a short walk from the Holy Mosque, right in the heart of
                  Madinah's shopping district. It offers rooms with satellite TV.Each room is air conditioned and some
                  have a sitting area. A work desk and a minibar are equipped in all accommodations.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Le Bosphorus Al Madinah.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Le Bosphorus Al Madinah</h2>
              <div class="description">
                <p>Attractively located in the center of Al Madinah, Le Bosphorus Al Madinah features continental
                  breakfast and free WiFi throughout the property. The property is located less than 0.6 mi from
                  Al-Masjid an-Nabawi, 3.3 mi from Quba Mosque and 3.5 mi from Qiblatain Mosque. The accommodations
                  offers a shared lounge, room service and currency exchange for guests.</p>
              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Medina</h1>
      </div>
      <!--end-->
      <div class="tab">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/LeParkConcordHotel&ResidentNajran.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Le Park Concord Hotel & Resident Najran</h2>
              <div class="description">
                <p>Le Park Concord Hotel & Resident Najran is located in Najran. Among the facilities at this property
                  are a kids' club and room service, along with free WiFi throughout the property. Guests can use the
                  spa and wellness center with a fitness center, sauna, and hot tub, as well as a restaurant.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Elite Najran.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Elite Najran</h2>
              <div class="description">
                <p>A good location for a stress-free getaway in Najran, Elite Najran is a condo hotel surrounded by
                  views of the city. The property features a bar, shared lounge, and parking on-site among other
                  facilities. There's a private entrance at the condo hotel for the convenience of those who stay. The
                  accommodation features a 24-hour front desk, an elevator, and luggage storage for guests.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/The District Hotel Najran.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">The District Hotel Najran</h2>
              <div class="description">
                <p>The District Hotel Najran has a fitness center, garden, a shared lounge and terrace in Najran. This
                  4-star hotel offers room service and a concierge service. The property has a sauna, hot tub,
                  restaurant and free WiFi.</p>
              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Najran</h1>
      </div>
      <!--end-->
      <div class="tab">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Hilton Garden Inn Tabuk.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Hilton Garden Inn Tabuk</h2>
              <div class="description">
                <p>Hilton Garden Inn Tabuk has a seasonal outdoor swimming pool, fitness center, a shared lounge and
                  restaurant in Tabuk. This 4-star hotel offers a shared kitchen, room service and free WiFi. The
                  property has a concierge service, luggage storage space and currency exchange for guests.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Grand Millennium Tabuk.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Grand Millennium Tabuk</h2>
              <div class="description">
                <p>Grand Millennium Tabuk features free WiFi throughout the property and views of garden in Tabuk.
                  Offering a restaurant, the property also features a shared lounge, as well as a sauna and a hot tub.
                  The property has a year-round outdoor pool, indoor pool, fitness center and garden.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Banan Hotel Suites.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Banan Hotel Suites</h2>
              <div class="description">
                <p>Banan Hotel Suites is located in Tabuk. With free WiFi, this 3-star hotel offers room service and a
                  24-hour front desk.All rooms come with an electric tea pot and a private bathroom with a bidet and
                  free toiletries, while selected rooms will provide you with a kitchenette equipped with a fridge. All
                  guest rooms will provide guests with air conditioning, a safety deposit box and a flat-screen TV.</p>
              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Tabuk</h1>
      </div>
      <!--end-->
      <div class="tab">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Iridium Hotel.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Iridium Hotel</h2>
              <div class="description">
                <p>Located in Taif, 2.6 miles from Jouri Mall, Iridium Hotel has accommodations with a fitness center,
                  free private parking, a terrace and a restaurant. With free WiFi, this 5-star hotel offers a kids'
                  club and room service. Guests can have a drink at the bar.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/InterContinental Taif, an IHG Hotel.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">InterContinental Taif, an IHG Hotel</h2>
              <div class="description">
                <p>The InterContinental Taif is a luxury hotel in the popular resort area of the Hejaz Mountains.
                  Situated at an elevation of 5577 feet, this 5-star hotel is the perfect spot to enjoy the cooler
                  temperatures, mountain air and picturesque surroundings.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Velar Inn Hotel.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Velar Inn Hotel</h2>
              <div class="description">
                <p>Located in Taif, 15 miles from Jouri Mall, Velar Inn Hotel has accommodations with a fitness center,
                  free private parking, a restaurant and a bar. This 4-star hotel offers a 24-hour front desk, a
                  business center and free WiFi. The hotel has an indoor pool, sauna and room service.
                </p>
              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Taif</h1>
      </div>
      <!--end-->
      <div class="tab">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Guest House Hotel.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Guest House Hotel</h2>
              <div class="description">
                <p>Guest House Hotel is located in Yanbu, within 12 miles of Sharm Yanbu and 3.2 miles of Yanbu
                  Commercial Port. This 4-star hotel offers room service and a 24-hour front desk. The property has an
                  indoor pool, fitness center, restaurant and free WiFi throughout the property.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Radwa Ramada Resort.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Radwa Ramada Resort</h2>
              <div class="description">
                <p>Located in Yanbu, 8.7 miles from Sharm Yanbu, Radwa Ramada Resort has accommodations with an outdoor
                  swimming pool, free private parking, a fitness center and a garden. Featuring room service, this
                  property also welcomes guests with a restaurant and a terrace. The property provides luggage storage
                  space, and currency exchange for guests.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/rosalina.webp" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">ROSALINA HOTEL</h2>
              <div class="description">
                <p>rosalina hotel offers accommodations in Yanbu, 12 miles from Al Fairouz Park and 12 miles from King
                  Fahad Industrial Port. This sustainable condo hotel is located 15 miles from Sharm Yanbu and 2.3 miles
                  from Yanbu Commercial Port. The condo hotel also offers free Wifi, free private parking, and
                  facilities for disabled guests.
                </p>
              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Yanbu</h1>
      </div>
      <!--end-->
      <div class="tab">
        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/Abat Park Hotel suites.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">Abat Park Hotel suites</h2>
              <div class="description">
                <p>Abat Park Hotel suites is a 4-star property located in Al Baha. The hotel also provides free WiFi and
                  free private parking.Complete with a private bathroom equipped with a bidet and free toiletries, guest
                  rooms at the hotel have a flat-screen TV and air conditioning, and selected rooms contain a seating
                  area. At Abat Park Hotel suites each room includes bed linen and towels.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/DiYar Home Hotel.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">DiYar Home Hotel</h2>
              <div class="description">
                <p>DiYar Home Hotel is offering accommodations in Baljurashi. With free WiFi, this 3-star hotel offers
                  room service and a 24-hour front desk. The property has an ATM and a concierge service for guests.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="left-column">
            <div class="img-card">
              <img src="images/National Park Hotel.jpg" alt="">
            </div>
          </div>
          <div class="right-column">
            <div class="info">
              <h2 class="city">National Park Hotel</h2>
              <div class="description">
                <p>National Park Hotel has a fitness center, garden, a terrace and restaurant in Baljurashi. This 4-star
                  hotel offers a business center and a concierge service. The property has a 24-hour front desk, airport
                  transportation, room service and free WiFi throughout the property.
                </p>
              </div>
            </div>
          </div>
        </div>
        <h1 class="country">Al-Baha</h1>
      </div>
      <!--end-->
    </div>

  </section>

  <!--========== Main javascript ==========-->
  <script src="main.js"></script>

</body>

</html>