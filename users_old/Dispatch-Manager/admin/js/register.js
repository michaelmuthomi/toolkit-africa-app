function showDiv(select) {

    switch (select.value) {
        case 'Eastern':
            document.getElementById('eastern').style.display = "block";
            document.getElementById('nairobi').style.display = "none";
            document.getElementById('central').style.display = "none";
            document.getElementById('rift_valley').style.display = "none";
            document.getElementById('north_eastern').style.display = "none";
            document.getElementById('nyanza').style.display = "none";
            document.getElementById('western').style.display = "none";
            document.getElementById('coast').style.display = "none";
            break;
        case 'Central':
            document.getElementById('central').style.display = "block";
            document.getElementById('nairobi').style.display = "none";
            document.getElementById('eastern').style.display = "none";
            document.getElementById('rift_valley').style.display = "none";
            document.getElementById('north_eastern').style.display = "none";
            document.getElementById('nyanza').style.display = "none";
            document.getElementById('western').style.display = "none";
            document.getElementById('coast').style.display = "none";
            break;
        case 'Rift Valley':
            document.getElementById('rift_valley').style.display = "block";
            document.getElementById('nairobi').style.display = "none";
            document.getElementById('eastern').style.display = "none";
            document.getElementById('central').style.display = "none";
            document.getElementById('north_eastern').style.display = "none";
            document.getElementById('nyanza').style.display = "none";
            document.getElementById('western').style.display = "none";
            document.getElementById('coast').style.display = "none";
            break;
        case 'North Eastern':
            document.getElementById('north_eastern').style.display = "block";
            document.getElementById('nairobi').style.display = "none";
            document.getElementById('eastern').style.display = "none";
            document.getElementById('central').style.display = "none";
            document.getElementById('rift_valley').style.display = "none";
            document.getElementById('nyanza').style.display = "none";
            document.getElementById('western').style.display = "none";
            document.getElementById('coast').style.display = "none";
            break;
        case 'Nyanza':
            document.getElementById('nyanza').style.display = "block";
            document.getElementById('nairobi').style.display = "none";
            document.getElementById('eastern').style.display = "none";
            document.getElementById('central').style.display = "none";
            document.getElementById('rift_valley').style.display = "none";
            document.getElementById('north_eastern').style.display = "none";
            document.getElementById('western').style.display = "none";
            document.getElementById('coast').style.display = "none";
            break;
        case 'Western':
            document.getElementById('western').style.display = "block";
            document.getElementById('nairobi').style.display = "none";
            document.getElementById('eastern').style.display = "none";
            document.getElementById('central').style.display = "none";
            document.getElementById('rift_valley').style.display = "none";
            document.getElementById('north_eastern').style.display = "none";
            document.getElementById('nyanza').style.display = "none";
            document.getElementById('coast').style.display = "none";
            break;
        case 'Coast':
            document.getElementById('coast').style.display = "block";
            document.getElementById('nairobi').style.display = "none";
            document.getElementById('eastern').style.display = "none";
            document.getElementById('central').style.display = "none";
            document.getElementById('rift_valley').style.display = "none";
            document.getElementById('north_eastern').style.display = "none";
            document.getElementById('nyanza').style.display = "none";
            document.getElementById('western').style.display = "none";
            break;
        case 'Nairobi':
            document.getElementById('nairobi').style.display = "block";
            document.getElementById('eastern').style.display = "none";
            document.getElementById('central').style.display = "none";
            document.getElementById('rift_valley').style.display = "none";
            document.getElementById('north_eastern').style.display = "none";
            document.getElementById('nyanza').style.display = "none";
            document.getElementById('western').style.display = "none";
            document.getElementById('coast').style.display = "none";
            break;
        default:
            document.getElementById('eastern').style.display = "none";
            document.getElementById('central').style.display = "none";
            document.getElementById('rift_valley').style.display = "none";
            document.getElementById('north_eastern').style.display = "none";
            document.getElementById('nyanza').style.display = "none";
            document.getElementById('western').style.display = "none";
            document.getElementById('coast').style.display = "none";
            document.getElementById('nairobi').style.display = "none";
    }
}

//for sub county
function showSub(select) {

    switch (select.value) {
        case 'Baringos':
            document.getElementById('Baringos').style.display = "block";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Bomets':
            document.getElementById('Bomets').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Bungomas':
            document.getElementById('Bungomas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Busias':
            document.getElementById('Busias').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Elgeyo-Marakwets':
            document.getElementById('Elgeyo-Marakwets').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Embus':
            document.getElementById('Embus').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Garissas':
            document.getElementById('Garissas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Homa-Bays':
            document.getElementById('Homa-Bays').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Isiolos':
            document.getElementById('Isiolos').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Kajiados':
            document.getElementById('Kajiados').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Kakamegas':
            document.getElementById('Kakamegas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Kerichos':
            document.getElementById('Kerichos').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Kiambus':
            document.getElementById('Kiambus').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Kilifis':
            document.getElementById('Kilifis').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;


        case 'Kirinyagas':
            document.getElementById('Kirinyagas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Kisiis':
            document.getElementById('Kisiis').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Kisumus':
            document.getElementById('Kisumus').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Kitui':
            document.getElementById('Kitui').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;


        case 'Kwales':
            document.getElementById('Kwales').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Laikipias':
            document.getElementById('Laikipias').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Lamus':
            document.getElementById('Lamus').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Isiolo').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;


        case 'Machakos':
            document.getElementById('Machakos').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Makuenis':
            document.getElementById('Makuenis').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Manderas':
            document.getElementById('Manderas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Merus':
            document.getElementById('Merus').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Migoris':
            document.getElementById('Migoris').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Marsabits':
            document.getElementById('Marsabits').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Mombasas':
            document.getElementById('Mombasas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Murangas':
            document.getElementById('Murangas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Nairobis':
            document.getElementById('Nairobis').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Nakurus':
            document.getElementById('Nakurus').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Nandis':
            document.getElementById('Nandis').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Naroks':
            document.getElementById('Naroks').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Nyamiras':
            document.getElementById('Nyamiras').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Nyandaruas':
            document.getElementById('Nyandaruas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Nyeris':
            document.getElementById('Nyeris').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Samburus':
            document.getElementById('Samburus').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Siayas':
            document.getElementById('Siayas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Taita-Tavetas':
            document.getElementById('Taita-Tavetas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Tana-Rivers':
            document.getElementById('Tana-Rivers').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Tharaka-Nithis':
            document.getElementById('Tharaka-Nithis').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;


        case 'Transzoias':
            document.getElementById('Transzoias').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Turkanas':
            document.getElementById('Turkanas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Uasin-Gishus':
            document.getElementById('Uasin-Gishus').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'Vihigas':
            document.getElementById('Vihigas').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
            break;

        case 'West-Pokots':
            document.getElementById('West-Pokots').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";

            break;

        case 'Wajirs':
            document.getElementById('Wajirs').style.display = "block";
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";

            break;

        default:
            document.getElementById('Baringos').style.display = "none";
            document.getElementById('Bomets').style.display = "none";
            document.getElementById('Bungomas').style.display = "none";
            document.getElementById('Busias').style.display = "none";
            document.getElementById('Elgeyo-Marakwets').style.display = "none";
            document.getElementById('Embus').style.display = "none";
            document.getElementById('Garissas').style.display = "none";
            document.getElementById('Homa-Bays').style.display = "none";
            document.getElementById('Isiolos').style.display = "none";
            document.getElementById('Kajiados').style.display = "none";
            document.getElementById('Kakamegas').style.display = "none";
            document.getElementById('Kerichos').style.display = "none";
            document.getElementById('Kiambus').style.display = "none";
            document.getElementById('Kilifis').style.display = "none";
            document.getElementById('Kirinyagas').style.display = "none";
            document.getElementById('Kisiis').style.display = "none";
            document.getElementById('Kisumus').style.display = "none";
            document.getElementById('Kitui').style.display = "none";
            document.getElementById('Kwales').style.display = "none";
            document.getElementById('Laikipias').style.display = "none";
            document.getElementById('Lamus').style.display = "none";
            document.getElementById('Machakos').style.display = "none";
            document.getElementById('Makuenis').style.display = "none";
            document.getElementById('Manderas').style.display = "none";
            document.getElementById('Marsabits').style.display = "none";
            document.getElementById('Merus').style.display = "none";
            document.getElementById('Migoris').style.display = "none";
            document.getElementById('Mombasas').style.display = "none";
            document.getElementById('Murangas').style.display = "none";
            document.getElementById('Nairobis').style.display = "none";
            document.getElementById('Nakurus').style.display = "none";
            document.getElementById('Nandis').style.display = "none";
            document.getElementById('Naroks').style.display = "none";
            document.getElementById('Nyamiras').style.display = "none";
            document.getElementById('Nyandaruas').style.display = "none";
            document.getElementById('Nyeris').style.display = "none";
            document.getElementById('Samburus').style.display = "none";
            document.getElementById('Siayas').style.display = "none";
            document.getElementById('Taita-Tavetas').style.display = "none";
            document.getElementById('Tana-Rivers').style.display = "none";
            document.getElementById('Tharaka-Nithis').style.display = "none";
            document.getElementById('Transzoias').style.display = "none";
            document.getElementById('Turkanas').style.display = "none";
            document.getElementById('Uasin-Gishus').style.display = "none";
            document.getElementById('Vihigas').style.display = "none";
            document.getElementById('West-Pokots').style.display = "none";
            document.getElementById('Wajirs').style.display = "none";
    }

}
//for baringo wards
function showBarWard(select) {

    switch (select.value) {
        case 'Baringo Central [1]':
            document.getElementById('Baringo Central [1]').style.display = "block";
            document.getElementById('Baringo North [2]').style.display = "none";
            document.getElementById('Baringo South [3]').style.display = "none";
            document.getElementById('Eldama Ravine [4]').style.display = "none";
            document.getElementById('Mogotio [5]').style.display = "none";
            document.getElementById('Tiaty [6]').style.display = "none";
            break;
        case 'Baringo North [2]':
            document.getElementById('Baringo North [2]').style.display = "block";
            document.getElementById('Baringo Central [1]').style.display = "none";
            document.getElementById('Baringo South [3]').style.display = "none";
            document.getElementById('Eldama Ravine [4]').style.display = "none";
            document.getElementById('Mogotio [5]').style.display = "none";
            document.getElementById('Tiaty [6]').style.display = "none";
            break;
        case 'Baringo South [3]':
            document.getElementById('Baringo South [3]').style.display = "block";
            document.getElementById('Baringo North [2]').style.display = "none";
            document.getElementById('Baringo Central [1]').style.display = "none";
            document.getElementById('Eldama Ravine [4]').style.display = "none";
            document.getElementById('Mogotio [5]').style.display = "none";
            document.getElementById('Tiaty [6]').style.display = "none";
            break;
        case 'Eldama Ravine [4]':
            document.getElementById('Eldama Ravine [4]').style.display = "block";
            document.getElementById('Baringo South [3]').style.display = "none";
            document.getElementById('Baringo North [2]').style.display = "none";
            document.getElementById('Baringo Central [1]').style.display = "none";
            document.getElementById('Mogotio [5]').style.display = "none";
            document.getElementById('Tiaty [6]').style.display = "none";
            break;
        case 'Mogotio [5]':
            document.getElementById('Mogotio [5]').style.display = "block";
            document.getElementById('Eldama Ravine [4]').style.display = "none";
            document.getElementById('Baringo South [3]').style.display = "none";
            document.getElementById('Baringo North [2]').style.display = "none";
            document.getElementById('Baringo Central [1]').style.display = "none";
            document.getElementById('Tiaty [6]').style.display = "none";
            break;
        case 'Tiaty [6]':
            document.getElementById('Tiaty [6]').style.display = "block";
            document.getElementById('Mogotio [5]').style.display = "none";
            document.getElementById('Eldama Ravine [4]').style.display = "none";
            document.getElementById('Baringo South [3]').style.display = "none";
            document.getElementById('Baringo North [2]').style.display = "none";
            document.getElementById('Baringo Central [1]').style.display = "none";
            break;
        default:
            document.getElementById('Baringo Central [1]').style.display = "none";
            document.getElementById('Baringo North [2]').style.display = "none";
            document.getElementById('Baringo South [3]').style.display = "none";
            document.getElementById('Eldama Ravine [4]').style.display = "none";
            document.getElementById('Mogotio [5]').style.display = "none";
            document.getElementById('Tiaty [6]').style.display = "none";

    }
}
// Bomet Wards
function showBomWard(select) {
    switch (select.value) {
        case 'Bomet Central [7]':
            document.getElementById('Bomet Central [7]').style.display = "block";
            document.getElementById('Bomet East [8]').style.display = "none";
            document.getElementById('Chepalungu [9]').style.display = "none";
            document.getElementById('Konoin [10]').style.display = "none";
            document.getElementById('Sotik [11]').style.display = "none";
            break;

        case 'Bomet East [8]':
            document.getElementById('Bomet East [8]').style.display = "block";
            document.getElementById('Bomet Central [7]').style.display = "none";
            document.getElementById('Chepalungu [9]').style.display = "none";
            document.getElementById('Konoin [10]').style.display = "none";
            document.getElementById('Sotik [11]').style.display = "none";
            break;

        case 'Chepalungu [9]':
            document.getElementById('Chepalungu [9]').style.display = "block";
            document.getElementById('Bomet Central [7]').style.display = "none";
            document.getElementById('Bomet East [8]').style.display = "none";
            document.getElementById('Konoin [10]').style.display = "none";
            document.getElementById('Sotik [11]').style.display = "none";
            break;

        case 'Konoin [10]':
            document.getElementById('Konoin [10]').style.display = "block";
            document.getElementById('Bomet East [8]').style.display = "none";
            document.getElementById('Bomet Central [7]').style.display = "none";
            document.getElementById('Chepalungu [9]').style.display = "none";
            document.getElementById('Sotik [11]').style.display = "none";
            break;

        case 'Sotik [11]':
            document.getElementById('Sotik [11]').style.display = "block";
            document.getElementById('Konoin [10]').style.display = "none";
            document.getElementById('Bomet East [8]').style.display = "none";
            document.getElementById('Bomet Central [7]').style.display = "none";
            document.getElementById('Chepalungu [9]').style.display = "none";

            break;
        default:
            document.getElementById('Bomet Central [7]').style.display = "none";
            document.getElementById('Bomet East [8]').style.display = "none";
            document.getElementById('Chepalungu [9]').style.display = "none";
            document.getElementById('Konoin [10]').style.display = "none";
            document.getElementById('Sotik [11]').style.display = "none";

    }
}
// for Bungoma Wards
function showBunWard(select) {
    switch (select.value) {
        case 'Bumula [12]':
            document.getElementById('Bumula [12]').style.display = "block";
            document.getElementById('Kabuchai [13]').style.display = "none";
            document.getElementById('Kanduyi [14]').style.display = "none";
            document.getElementById('Kimilili [15]').style.display = "none";
            document.getElementById('Mt Elgon [16]').style.display = "none";
            document.getElementById('Sirisia[17]').style.display = "none";
            document.getElementById('Tongaren [18]').style.display = "none";
            document.getElementById('Webuye East [19]').style.display = "none";
            document.getElementById('Webuye West').style.display = "none";
            break;

        case 'Kabuchai [13]':
            document.getElementById('Kabuchai [13]').style.display = "block";
            document.getElementById('Bumula [12]').style.display = "none";
            document.getElementById('Kanduyi [14]').style.display = "none";
            document.getElementById('Kimilili [15]').style.display = "none";
            document.getElementById('Mt Elgon [16]').style.display = "none";
            document.getElementById('Sirisia[17]').style.display = "none";
            document.getElementById('Tongaren [18]').style.display = "none";
            document.getElementById('Webuye East [19]').style.display = "none";
            document.getElementById('Webuye West').style.display = "none";
            break;

        case 'Kanduyi [14]':
            document.getElementById('Kanduyi [14]').style.display = "block";
            document.getElementById('Bumula [12]').style.display = "none";
            document.getElementById('Kabuchai [13]').style.display = "none";
            document.getElementById('Kimilili [15]').style.display = "none";
            document.getElementById('Mt Elgon [16]').style.display = "none";
            document.getElementById('Sirisia[17]').style.display = "none";
            document.getElementById('Tongaren [18]').style.display = "none";
            document.getElementById('Webuye East [19]').style.display = "none";
            document.getElementById('Webuye West').style.display = "none";
            break;

        case 'Kimilili [15]':
            document.getElementById('Kimilili [15]').style.display = "block";
            document.getElementById('Bumula [12]').style.display = "none";
            document.getElementById('Kabuchai [13]').style.display = "none";
            document.getElementById('Kanduyi [14]').style.display = "none";
            document.getElementById('Mt Elgon [16]').style.display = "none";
            document.getElementById('Sirisia[17]').style.display = "none";
            document.getElementById('Tongaren [18]').style.display = "none";
            document.getElementById('Webuye East [19]').style.display = "none";
            document.getElementById('Webuye West').style.display = "none";
            break;

        case 'Mt Elgon [16]':
            document.getElementById('Mt Elgon [16]').style.display = "block";
            document.getElementById('Bumula [12]').style.display = "none";
            document.getElementById('Kabuchai [13]').style.display = "none";
            document.getElementById('Kanduyi [14]').style.display = "none";
            document.getElementById('Kimilili [15]').style.display = "none";
            document.getElementById('Sirisia[17]').style.display = "none";
            document.getElementById('Tongaren [18]').style.display = "none";
            document.getElementById('Webuye East [19]').style.display = "none";
            document.getElementById('Webuye West').style.display = "none";

            break;
        case 'Sirisia[17]':
            document.getElementById('Sirisia[17]').style.display = "block";
            document.getElementById('Bumula [12]').style.display = "none";
            document.getElementById('Kabuchai [13]').style.display = "none";
            document.getElementById('Kanduyi [14]').style.display = "none";
            document.getElementById('Kimilili [15]').style.display = "none";
            document.getElementById('Mt Elgon [16]').style.display = "none";
            document.getElementById('Tongaren [18]').style.display = "none";
            document.getElementById('Webuye East [19]').style.display = "none";
            document.getElementById('Webuye West').style.display = "none";

            break;
        case 'Tongaren [18]':
            document.getElementById('Tongaren [18]').style.display = "block";
            document.getElementById('Bumula [12]').style.display = "none";
            document.getElementById('Kabuchai [13]').style.display = "none";
            document.getElementById('Kanduyi [14]').style.display = "none";
            document.getElementById('Kimilili [15]').style.display = "none";
            document.getElementById('Mt Elgon [16]').style.display = "none";
            document.getElementById('Sirisia[17]').style.display = "none";
            document.getElementById('Webuye East [19]').style.display = "none";
            document.getElementById('Webuye West').style.display = "none";

            break;

        case 'Webuye East [19]':
            document.getElementById('Webuye East [19]').style.display = "block";
            document.getElementById('Tongaren [18]').style.display = "none";
            document.getElementById('Bumula [12]').style.display = "none";
            document.getElementById('Kabuchai [13]').style.display = "none";
            document.getElementById('Kanduyi [14]').style.display = "none";
            document.getElementById('Kimilili [15]').style.display = "none";
            document.getElementById('Mt Elgon [16]').style.display = "none";
            document.getElementById('Sirisia[17]').style.display = "none";
            document.getElementById('Webuye West').style.display = "none";

            break;

        case 'Webuye West':
            document.getElementById('Webuye West').style.display = "block";
            document.getElementById('Webuye East [19]').style.display = "none";
            document.getElementById('Bumula [12]').style.display = "none";
            document.getElementById('Kabuchai [13]').style.display = "none";
            document.getElementById('Kanduyi [14]').style.display = "none";
            document.getElementById('Kimilili [15]').style.display = "none";
            document.getElementById('Mt Elgon [16]').style.display = "none";
            document.getElementById('Sirisia[17]').style.display = "none";
            document.getElementById('Tongaren [18]').style.display = "none";


            break;
        default:
            document.getElementById('Bumula [12]').style.display = "none";
            document.getElementById('Kabuchai [13]').style.display = "none";
            document.getElementById('Kanduyi [14]').style.display = "none";
            document.getElementById('Kimilili [15]').style.display = "none";
            document.getElementById('Mt Elgon [16]').style.display = "none";
            document.getElementById('Sirisia[17]').style.display = "none";
            document.getElementById('Tongaren [18]').style.display = "none";
            document.getElementById('Webuye East [19]').style.display = "none";
            document.getElementById('Webuye West').style.display = "none";

    }
}
// for Busia Wards
function showBusWard(select) {
    switch (select.value) {
        case 'Butula [22]':
            document.getElementById('Butula [22]').style.display = "block";
            document.getElementById('Funyula [23]').style.display = "none";
            document.getElementById('Matayos [24]').style.display = "none";
            document.getElementById('Nambale [25]').style.display = "none";
            document.getElementById('Teso North [26]').style.display = "none";
            document.getElementById('Teso South [27]').style.display = "none";
            break;;

        case 'Funyula [23]':
            document.getElementById('Funyula [23]').style.display = "block";
            document.getElementById('Butula [22]').style.display = "none";
            document.getElementById('Matayos [24]').style.display = "none";
            document.getElementById('Nambale [25]').style.display = "none";
            document.getElementById('Teso North [26]').style.display = "none";
            document.getElementById('Teso South [27]').style.display = "none";
            break;

        case 'Matayos [24]':
            document.getElementById('Matayos [24]').style.display = "block";
            document.getElementById('Butula [22]').style.display = "none";
            document.getElementById('Funyula [23]').style.display = "none";
            document.getElementById('Nambale [25]').style.display = "none";
            document.getElementById('Teso North [26]').style.display = "none";
            document.getElementById('Teso South [27]').style.display = "none";
            break;
        case 'Nambale [25]':
            document.getElementById('Nambale [25]').style.display = "block";
            document.getElementById('Butula [22]').style.display = "none";
            document.getElementById('Funyula [23]').style.display = "none";
            document.getElementById('Matayos [24]').style.display = "none";
            document.getElementById('Teso North [26]').style.display = "none";
            document.getElementById('Teso South [27]').style.display = "none";
            break;

        case 'Teso North [26]':
            document.getElementById('Teso North [26]').style.display = "block";
            document.getElementById('Butula [22]').style.display = "none";
            document.getElementById('Funyula [23]').style.display = "none";
            document.getElementById('Matayos [24]').style.display = "none";
            document.getElementById('Nambale [25]').style.display = "none";
            document.getElementById('Teso South [27]').style.display = "none";
            break;
        case 'Teso South [27]':
            document.getElementById('Teso South [27]').style.display = "block";
            document.getElementById('Butula [22]').style.display = "none";
            document.getElementById('Funyula [23]').style.display = "none";
            document.getElementById('Matayos [24]').style.display = "none";
            document.getElementById('Nambale [25]').style.display = "none";
            document.getElementById('Teso North [26]').style.display = "none";

            break;
        default:
            document.getElementById('Butula [22]').style.display = "none";
            document.getElementById('Funyula [23]').style.display = "none";
            document.getElementById('Matayos [24]').style.display = "none";
            document.getElementById('Nambale [25]').style.display = "none";
            document.getElementById('Teso North [26]').style.display = "none";
            document.getElementById('Teso South [27]').style.display = "none";

    }
}
//for Elgeiyo Marakwet
function showElgWard(select) {
    switch (select.value) {
        case 'Keiyo North [28]':
            document.getElementById('Keiyo North [28]').style.display = "block";
            document.getElementById('Keiyo South [29]').style.display = "none";
            document.getElementById('Marakwet East [30]').style.display = "none";
            document.getElementById('Marakwet West [31]').style.display = "none";
            break;
        case 'Keiyo South [29]':
            document.getElementById('Keiyo South [29]').style.display = "block";
            document.getElementById('Keiyo North [28]').style.display = "none";
            document.getElementById('Marakwet East [30]').style.display = "none";
            document.getElementById('Marakwet West [31]').style.display = "none";
            break;
        case 'Marakwet East [30]':
            document.getElementById('Marakwet East [30]').style.display = "block";
            document.getElementById('Keiyo North [28]').style.display = "none";
            document.getElementById('Keiyo South [29]').style.display = "none";
            document.getElementById('Marakwet West [31]').style.display = "none";
            break;
        case 'Marakwet West [31]':
            document.getElementById('Marakwet West [31]').style.display = "block";
            document.getElementById('Keiyo North [28]').style.display = "none";
            document.getElementById('Keiyo South [29]').style.display = "none";
            document.getElementById('Marakwet East [30]').style.display = "none";

            break;


        default:
            document.getElementById('Keiyo North [28]').style.display = "none";
            document.getElementById('Keiyo South [29]').style.display = "none";
            document.getElementById('Marakwet East [30]').style.display = "none";
            document.getElementById('Marakwet West [31]').style.display = "none";

    }
}
//for Embus Wards
function showEmbWard(select) {
    switch (select.value) {
        case 'manyatta[32]':
            document.getElementById('manyatta[32]').style.display = "block";
            document.getElementById('Mbeere North [33]').style.display = "none";
            document.getElementById('Mbeere South [34]').style.display = "none";
            document.getElementById('Runyenjes [35]').style.display = "none";
            break;
        case 'Mbeere North [33]':
            document.getElementById('Mbeere North [33]').style.display = "block";
            document.getElementById('manyatta[32]').style.display = "none";
            document.getElementById('Mbeere South [34]').style.display = "none";
            document.getElementById('Runyenjes [35]').style.display = "none";
            break;
        case 'Mbeere South [34]':
            document.getElementById('Mbeere South [34]').style.display = "block";
            document.getElementById('manyatta[32]').style.display = "none";
            document.getElementById('Mbeere North [33]').style.display = "none";
            document.getElementById('Runyenjes [35]').style.display = "none";
            break;
        case 'Runyenjes [35]':
            document.getElementById('Runyenjes [35]').style.display = "block";
            document.getElementById('manyatta[32]').style.display = "none";
            document.getElementById('Mbeere North [33]').style.display = "none";
            document.getElementById('Mbeere South [34]').style.display = "none";
            break;


        default:
            document.getElementById('manyatta[32]').style.display = "none";
            document.getElementById('Mbeere North [33]').style.display = "none";
            document.getElementById('Mbeere South [34]').style.display = "none";
            document.getElementById('Runyenjes [35]').style.display = "none";

    }
}
//for Garissa wards
function showGarWard(select) {
    switch (select.value) {
        case 'Balambala [36]':
            document.getElementById('Balambala [36]').style.display = "block";
            document.getElementById('Dadaab [37]').style.display = "none";
            document.getElementById('Dujis [38]').style.display = "none";
            document.getElementById('Fafi [39]').style.display = "none";
            document.getElementById('Ijara [40]').style.display = "none";
            document.getElementById('Lagdera [41]').style.display = "none";
            break;
        case 'Dadaab [37]':
            document.getElementById('Dadaab [37]').style.display = "block";
            document.getElementById('Balambala [36]').style.display = "none";
            document.getElementById('Dujis [38]').style.display = "none";
            document.getElementById('Fafi [39]').style.display = "none";
            document.getElementById('Ijara [40]').style.display = "none";
            document.getElementById('Lagdera [41]').style.display = "none";
            break;
        case 'Dujis [38]':
            document.getElementById('Dujis [38]').style.display = "block";
            document.getElementById('Balambala [36]').style.display = "none";
            document.getElementById('Dadaab [37]').style.display = "none";
            document.getElementById('Fafi [39]').style.display = "none";
            document.getElementById('Ijara [40]').style.display = "none";
            document.getElementById('Lagdera [41]').style.display = "none";
            break;
        case 'Fafi [39]':
            document.getElementById('Fafi [39]').style.display = "block";
            document.getElementById('Balambala [36]').style.display = "none";
            document.getElementById('Dadaab [37]').style.display = "none";
            document.getElementById('Dujis [38]').style.display = "none";
            document.getElementById('Ijara [40]').style.display = "none";
            document.getElementById('Lagdera [41]').style.display = "none";
            break;
        case 'Ijara [40]':
            document.getElementById('Ijara [40]').style.display = "block";
            document.getElementById('Balambala [36]').style.display = "none";
            document.getElementById('Dadaab [37]').style.display = "none";
            document.getElementById('Dujis [38]').style.display = "none";
            document.getElementById('Fafi [39]').style.display = "none";
            document.getElementById('Lagdera [41]').style.display = "none";
            break;
        case 'Lagdera [41]':
            document.getElementById('Lagdera [41]').style.display = "block";
            document.getElementById('Balambala [36]').style.display = "none";
            document.getElementById('Dadaab [37]').style.display = "none";
            document.getElementById('Dujis [38]').style.display = "none";
            document.getElementById('Fafi [39]').style.display = "none";
            document.getElementById('Ijara [40]').style.display = "none";
            break;

        default:
            document.getElementById('Balambala [36]').style.display = "none";
            document.getElementById('Dadaab [37]').style.display = "none";
            document.getElementById('Dujis [38]').style.display = "none";
            document.getElementById('Fafi [39]').style.display = "none";
            document.getElementById('Ijara [40]').style.display = "none";
            document.getElementById('Lagdera [41]').style.display = "none";

    }
}
//for  Homa Bay Wards
function showHmWard(select) {
    switch (select.value) {
        case 'Homa Bay [42]':
            document.getElementById('Homa Bay [42]').style.display = "block";
            document.getElementById('Kabondo Kasipul [43]').style.display = "none";
            document.getElementById('Karachuonyo [44]').style.display = "none";
            document.getElementById('Kasipul [45]').style.display = "none";
            document.getElementById('Ndhiwa [47]').style.display = "none";
            document.getElementById('Rangwe [48]').style.display = "none";
            document.getElementById('Suba North').style.display = "none";
            document.getElementById('Suba South').style.display = "none";
            break;

        case 'Kabondo Kasipul [43]':
            document.getElementById('Kabondo Kasipul [43]').style.display = "block";
            document.getElementById('Homa Bay [42]').style.display = "none";
            document.getElementById('Karachuonyo [44]').style.display = "none";
            document.getElementById('Kasipul [45]').style.display = "none";
            document.getElementById('Mbita [46]').style.display = "none";
            document.getElementById('Ndhiwa [47]').style.display = "none";
            document.getElementById('Rangwe [48]').style.display = "none";
            document.getElementById('Suba North').style.display = "none";
            document.getElementById('Suba South').style.display = "none";
            break;
        case 'Karachuonyo [44]':
            document.getElementById('Karachuonyo [44]').style.display = "block";
            document.getElementById('Homa Bay [42]').style.display = "none";
            document.getElementById('Kabondo Kasipul [43]').style.display = "none";
            document.getElementById('Kasipul [45]').style.display = "none";
            document.getElementById('Mbita [46]').style.display = "none";
            document.getElementById('Ndhiwa [47]').style.display = "none";
            document.getElementById('Rangwe [48]').style.display = "none";
            document.getElementById('Suba North').style.display = "none";
            document.getElementById('Suba South').style.display = "none";
            break;

        case 'Kasipul [45]':
            document.getElementById('Kasipul [45]').style.display = "block";
            document.getElementById('Homa Bay [42]').style.display = "none";
            document.getElementById('Kabondo Kasipul [43]').style.display = "none";
            document.getElementById('Karachuonyo [44]').style.display = "none";
            document.getElementById('Mbita [46]').style.display = "none";
            document.getElementById('Ndhiwa [47]').style.display = "none";
            document.getElementById('Rangwe [48]').style.display = "none";
            document.getElementById('Suba North').style.display = "none";
            document.getElementById('Suba South').style.display = "none";
            break;
        case 'Mbita [46]':
            document.getElementById('Mbita [46]').style.display = "block";
            document.getElementById('Homa Bay [42]').style.display = "none";
            document.getElementById('Kabondo Kasipul [43]').style.display = "none";
            document.getElementById('Karachuonyo [44]').style.display = "none";
            document.getElementById('Kasipul [45]').style.display = "none";
            document.getElementById('Ndhiwa [47]').style.display = "none";
            document.getElementById('Rangwe [48]').style.display = "none";
            document.getElementById('Suba North').style.display = "none";
            document.getElementById('Suba South').style.display = "none";
            break;
        case 'Ndhiwa [47]':
            document.getElementById('Ndhiwa [47]').style.display = "block";
            document.getElementById('Homa Bay [42]').style.display = "none";
            document.getElementById('Kabondo Kasipul [43]').style.display = "none";
            document.getElementById('Karachuonyo [44]').style.display = "none";
            document.getElementById('Kasipul [45]').style.display = "none";
            document.getElementById('Mbita [46]').style.display = "none";
            document.getElementById('Rangwe [48]').style.display = "none";
            document.getElementById('Suba North').style.display = "none";
            document.getElementById('Suba South').style.display = "none";
            break;
        case 'Rangwe [48]':
            document.getElementById('Rangwe [48]').style.display = "block";
            document.getElementById('Homa Bay [42]').style.display = "none";
            document.getElementById('Kabondo Kasipul [43]').style.display = "none";
            document.getElementById('Karachuonyo [44]').style.display = "none";
            document.getElementById('Kasipul [45]').style.display = "none";
            document.getElementById('Mbita [46]').style.display = "none";
            document.getElementById('Ndhiwa [47]').style.display = "none";
            document.getElementById('Suba North').style.display = "none";
            document.getElementById('Suba South').style.display = "none";

            break;

        case 'Suba South':
            document.getElementById('Suba North').style.display = "block";
            document.getElementById('Rangwe [48]').style.display = "none";
            document.getElementById('Homa Bay [42]').style.display = "none";
            document.getElementById('Kabondo Kasipul [43]').style.display = "none";
            document.getElementById('Karachuonyo [44]').style.display = "none";
            document.getElementById('Kasipul [45]').style.display = "none";
            document.getElementById('Mbita [46]').style.display = "none";
            document.getElementById('Ndhiwa [47]').style.display = "none";
            document.getElementById('Suba South').style.display = "none";

            break;
        case 'Suba South':
            document.getElementById('Suba South').style.display = "block";
            document.getElementById('Rangwe [48]').style.display = "none";
            document.getElementById('Homa Bay [42]').style.display = "none";
            document.getElementById('Kabondo Kasipul [43]').style.display = "none";
            document.getElementById('Karachuonyo [44]').style.display = "none";
            document.getElementById('Kasipul [45]').style.display = "none";
            document.getElementById('Mbita [46]').style.display = "none";
            document.getElementById('Ndhiwa [47]').style.display = "none";
            document.getElementById('Suba North').style.display = "none";

            break;
        default:
            document.getElementById('Homa Bay [42]').style.display = "none";
            document.getElementById('Kabondo Kasipul [43]').style.display = "none";
            document.getElementById('Karachuonyo [44]').style.display = "none";
            document.getElementById('Kasipul [45]').style.display = "none";
            document.getElementById('Mbita [46]').style.display = "none";
            document.getElementById('Ndhiwa [47]').style.display = "none";
            document.getElementById('Rangwe [48]').style.display = "none";
            document.getElementById('Suba North').style.display = "none";
            document.getElementById('Suba South').style.display = "none";

    }
}
//for Isiolo Wards
function showIsWard(select) {
    switch (select.value) {
        case 'Isiolo North':
            document.getElementById('Isiolo North').style.display = "block";
            document.getElementById('Isiolo South').style.display = "none";
            break;

        case 'Isiolo South':
            document.getElementById('Isiolo South').style.display = "block";
            document.getElementById('Isiolo North').style.display = "none";
            break;

        default:
            document.getElementById('Isiolo North').style.display = "none";
            document.getElementById('Isiolo South').style.display = "none";

    }
}
// for Kajiado wards
function showKajWard(select) {
    switch (select.value) {
        case 'Kajiado Central [53]':
            document.getElementById('Kajiado Central [53]').style.display = "block";
            document.getElementById('Kajiado East [54]').style.display = "none";
            document.getElementById('Kajiado North [55]').style.display = "none";
            document.getElementById('Kajiado South [56]').style.display = "none";
            document.getElementById('Kajiado West [57]').style.display = "none";
            break;

        case 'Kajiado East [54]':
            document.getElementById('Kajiado East [54]').style.display = "block";
            document.getElementById('Kajiado Central [53]').style.display = "none";
            document.getElementById('Kajiado North [55]').style.display = "none";
            document.getElementById('Kajiado South [56]').style.display = "none";
            document.getElementById('Kajiado West [57]').style.display = "none";
            break;
        case 'Kajiado North [55]':
            document.getElementById('Kajiado North [55]').style.display = "block";
            document.getElementById('Kajiado Central [53]').style.display = "none";
            document.getElementById('Kajiado East [54]').style.display = "none";
            document.getElementById('Kajiado South [56]').style.display = "none";
            document.getElementById('Kajiado West [57]').style.display = "none";
            break;
        case 'Kajiado South [56]':
            document.getElementById('Kajiado South [56]').style.display = "block";
            document.getElementById('Kajiado Central [53]').style.display = "none";
            document.getElementById('Kajiado East [54]').style.display = "none";
            document.getElementById('Kajiado North [55]').style.display = "none";
            document.getElementById('Kajiado West [57]').style.display = "none";
            break;
        case 'Kajiado West [57]':
            document.getElementById('Kajiado West [57]').style.display = "block";
            document.getElementById('Kajiado Central [53]').style.display = "none";
            document.getElementById('Kajiado East [54]').style.display = "none";
            document.getElementById('Kajiado North [55]').style.display = "none";
            document.getElementById('Kajiado South [56]').style.display = "none";

            break;

        default:
            document.getElementById('Kajiado Central [53]').style.display = "none";
            document.getElementById('Kajiado East [54]').style.display = "none";
            document.getElementById('Kajiado North [55]').style.display = "none";
            document.getElementById('Kajiado South [56]').style.display = "none";
            document.getElementById('Kajiado West [57]').style.display = "none";

    }
}
// For kakamega wards
function showKakWard(select) {
    switch (select.value) {
        case 'Butere [58]':
            document.getElementById('Butere [58]').style.display = "block";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";
            break;


        case 'Ikolomani [59]':
            document.getElementById('Ikolomani [59]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";
            break;
        case 'Khwisero [60]':
            document.getElementById('Khwisero [60]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";
            break;
        case 'Likuyani [61]':
            document.getElementById('Likuyani [61]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";
            break;
        case 'Lugari [62]':
            document.getElementById('Lugari [62]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";

            break;
        case 'lurambi[63]':
            document.getElementById('lurambi[63]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";

            break;
        case 'Malava [64]':
            document.getElementById('Malava [64]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";

            break;
        case 'Matungu [65]':
            document.getElementById('Matungu [65]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";

            break;
        case 'Mumias East [66]':
            document.getElementById('Mumias East [66]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";
            break;
        case 'Mumias West [67]':
            document.getElementById('Mumias West [67]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";
            break;
        case 'Navakholo [68]':
            document.getElementById('Navakholo [68]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";

            document.getElementById('Shinyalu [69]').style.display = "none";
            break;
        case 'Shinyalu [69]':
            document.getElementById('Shinyalu [69]').style.display = "block";
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";

            break;

        default:
            document.getElementById('Butere [58]').style.display = "none";
            document.getElementById('Ikolomani [59]').style.display = "none";
            document.getElementById('Khwisero [60]').style.display = "none";
            document.getElementById('Likuyani [61]').style.display = "none";
            document.getElementById('Lugari [62]').style.display = "none";
            document.getElementById('lurambi[63]').style.display = "none";
            document.getElementById('Malava [64]').style.display = "none";
            document.getElementById('Matungu [65]').style.display = "none";
            document.getElementById('Mumias East [66]').style.display = "none";
            document.getElementById('Mumias West [67]').style.display = "none";
            document.getElementById('Navakholo [68]').style.display = "none";
            document.getElementById('Shinyalu [69]').style.display = "none";
    }
}
//for Kericho Wards
function showKerWard(select) {
    switch (select.value) {
        case 'Buret [70]':
            document.getElementById('Buret [70]').style.display = "block";
            document.getElementById('Ainamoi [71]').style.display = "none";
            document.getElementById('Belgut [72]').style.display = "none";
            document.getElementById('Kipkelion East [73]').style.display = "none";
            document.getElementById('Kipkelion West [74]').style.display = "none";
            document.getElementById('Sigowet [75]').style.display = "none";

            break;


        case 'Ainamoi [71]':
            document.getElementById('Ainamoi [71]').style.display = "block";
            document.getElementById('Buret [70]').style.display = "none";
            document.getElementById('Belgut [72]').style.display = "none";
            document.getElementById('Kipkelion East [73]').style.display = "none";
            document.getElementById('Kipkelion West [74]').style.display = "none";
            document.getElementById('Sigowet [75]').style.display = "none";
            break;
        case 'Belgut [72]':
            document.getElementById('Belgut [72]').style.display = "block";
            document.getElementById('Buret [70]').style.display = "none";
            document.getElementById('Ainamoi [71]').style.display = "none";
            document.getElementById('Kipkelion East [73]').style.display = "none";
            document.getElementById('Kipkelion West [74]').style.display = "none";
            document.getElementById('Sigowet [75]').style.display = "none";
            break;
        case 'Kipkelion East [73]':
            document.getElementById('Kipkelion East [73]').style.display = "block";
            document.getElementById('Buret [70]').style.display = "none";
            document.getElementById('Ainamoi [71]').style.display = "none";
            document.getElementById('Belgut [72]').style.display = "none";
            document.getElementById('Kipkelion West [74]').style.display = "none";
            document.getElementById('Sigowet [75]').style.display = "none";
            break;
        case 'Kipkelion West [74]':
            document.getElementById('Kipkelion West [74]').style.display = "block";
            document.getElementById('Buret [70]').style.display = "none";
            document.getElementById('Ainamoi [71]').style.display = "none";
            document.getElementById('Belgut [72]').style.display = "none";
            document.getElementById('Kipkelion East [73]').style.display = "none";
            document.getElementById('Sigowet [75]').style.display = "none";

            break;
        case 'Sigowet [75]':
            document.getElementById('Sigowet [75]').style.display = "block";
            document.getElementById('Buret [70]').style.display = "none";
            document.getElementById('Ainamoi [71]').style.display = "none";
            document.getElementById('Belgut [72]').style.display = "none";
            document.getElementById('Kipkelion East [73]').style.display = "none";
            document.getElementById('Kipkelion West [74]').style.display = "none";

            break;


        default:
            document.getElementById('Buret [70]').style.display = "none";
            document.getElementById('Ainamoi [71]').style.display = "none";
            document.getElementById('Belgut [72]').style.display = "none";
            document.getElementById('Kipkelion East [73]').style.display = "none";
            document.getElementById('Kipkelion West [74]').style.display = "none";
            document.getElementById('Sigowet [75]').style.display = "none";
    }
}
// for Kiambu wards
function showKiaWard(select) {
    switch (select.value) {
        case 'Gatundu North [76]':
            document.getElementById('Gatundu North [76]').style.display = "block";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";

            break;


        case 'Gatundu South [77]':
            document.getElementById('Gatundu South [77]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";
            break;
        case 'Githunguri [78]':
            document.getElementById('Githunguri [78]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";
            break;
        case 'Juja [79]':
            document.getElementById('Juja [79]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";
            break;
        case 'Kabete [80]':
            document.getElementById('Kabete [80]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";

            break;
        case 'Kiambaa [81]':
            document.getElementById('Kiambaa [81]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";

            break;
        case 'Kiambu [82]':
            document.getElementById('Kiambu [82]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";

            break;
        case 'Kikuyu [83]':
            document.getElementById('Kikuyu [83]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";

            break;
        case 'Lari [84]':
            document.getElementById('Lari [84]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";

            break;
        case 'Limuru [85]':
            document.getElementById('Limuru [85]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";

            break;
        case 'Ruiru [86]':
            document.getElementById('Ruiru [86]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";

            break;
        case 'Thika Town [87]':
            document.getElementById('Thika Town [87]').style.display = "block";
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";

            break;


        default:
            document.getElementById('Gatundu North [76]').style.display = "none";
            document.getElementById('Gatundu South [77]').style.display = "none";
            document.getElementById('Githunguri [78]').style.display = "none";
            document.getElementById('Juja [79]').style.display = "none";
            document.getElementById('Kabete [80]').style.display = "none";
            document.getElementById('Kiambaa [81]').style.display = "none";
            document.getElementById('Kiambu [82]').style.display = "none";
            document.getElementById('Kikuyu [83]').style.display = "none";
            document.getElementById('Lari [84]').style.display = "none";
            document.getElementById('Limuru [85]').style.display = "none";
            document.getElementById('Ruiru [86]').style.display = "none";
            document.getElementById('Thika Town [87]').style.display = "none";
    }
}
// for Kilifi wards
function showKilWard(select) {
    switch (select.value) {
        case 'Ganze [88]':
            document.getElementById('Ganze [88]').style.display = "block";
            document.getElementById('Kaloleni [89]').style.display = "none";
            document.getElementById('Kilifi North [90]').style.display = "none";
            document.getElementById('Kilifi South').style.display = "none";
            document.getElementById('Magarini [91]').style.display = "none";
            document.getElementById('Malindi [92]').style.display = "none";
            document.getElementById('Rabai [93]').style.display = "none";

            break;


        case 'Kaloleni [89]':
            document.getElementById('Kaloleni [89]').style.display = "block";
            document.getElementById('Ganze [88]').style.display = "none";
            document.getElementById('Kilifi North [90]').style.display = "none";
            document.getElementById('Kilifi South').style.display = "none";
            document.getElementById('Magarini [91]').style.display = "none";
            document.getElementById('Malindi [92]').style.display = "none";
            document.getElementById('Rabai [93]').style.display = "none";
            break;
        case 'Kilifi North [90]':
            document.getElementById('Kilifi North [90]').style.display = "block";
            document.getElementById('Kilifi South').style.display = "none";
            document.getElementById('Ganze [88]').style.display = "none";
            document.getElementById('Kaloleni [89]').style.display = "none";
            document.getElementById('Magarini [91]').style.display = "none";
            document.getElementById('Malindi [92]').style.display = "none";
            document.getElementById('Rabai [93]').style.display = "none";
            break;
        case 'Kilifi South':
            document.getElementById('Kilifi South').style.display = "block";
            document.getElementById('Kilifi North [90]').style.display = "none";
            document.getElementById('Ganze [88]').style.display = "none";
            document.getElementById('Kaloleni [89]').style.display = "none";
            document.getElementById('Magarini [91]').style.display = "none";
            document.getElementById('Malindi [92]').style.display = "none";
            document.getElementById('Rabai [93]').style.display = "none";
            break;
        case 'Magarini [91]':
            document.getElementById('Magarini [91]').style.display = "block";
            document.getElementById('Ganze [88]').style.display = "none";
            document.getElementById('Kaloleni [89]').style.display = "none";
            document.getElementById('Kilifi North [90]').style.display = "none";
            document.getElementById('Kilifi South').style.display = "none";
            document.getElementById('Malindi [92]').style.display = "none";
            document.getElementById('Rabai [93]').style.display = "none";
            break;
        case 'Malindi [92]':
            document.getElementById('Malindi [92]').style.display = "block";
            document.getElementById('Ganze [88]').style.display = "none";
            document.getElementById('Kaloleni [89]').style.display = "none";
            document.getElementById('Kilifi North [90]').style.display = "none";
            document.getElementById('Kilifi South').style.display = "none";
            document.getElementById('Magarini [91]').style.display = "none";
            document.getElementById('Rabai [93]').style.display = "none";

            break;
        case 'Rabai [93]':
            document.getElementById('Rabai [93]').style.display = "block";
            document.getElementById('Ganze [88]').style.display = "none";
            document.getElementById('Kaloleni [89]').style.display = "none";
            document.getElementById('Kilifi North [90]').style.display = "none";
            document.getElementById('Kilifi South').style.display = "none";
            document.getElementById('Magarini [91]').style.display = "none";
            document.getElementById('Malindi [92]').style.display = "none";
            break;

        default:
            document.getElementById('Ganze [88]').style.display = "none";
            document.getElementById('Kaloleni [89]').style.display = "none";
            document.getElementById('Kilifi North [90]').style.display = "none";
            document.getElementById('Kilifi South').style.display = "none";
            document.getElementById('Magarini [91]').style.display = "none";
            document.getElementById('Malindi [92]').style.display = "none";
            document.getElementById('Rabai [93]').style.display = "none";;
    }
}
// For Kirinyaga wards
function showKirWard(select) {
    switch (select.value) {
        case 'Gichugu [94]':
            document.getElementById('Gichugu [94]').style.display = "block";
            document.getElementById('Kirinyaga Central [95]').style.display = "none";
            document.getElementById('Mwea [96]').style.display = "none";
            document.getElementById('Ndia [97]').style.display = "none";

            break;


        case 'Kirinyaga Central [95]':
            document.getElementById('Kirinyaga Central [95]').style.display = "block";
            document.getElementById('Gichugu [94]').style.display = "none";
            document.getElementById('Mwea [96]').style.display = "none";
            document.getElementById('Ndia [97]').style.display = "none";
            break;
        case 'Mwea [96]':
            document.getElementById('Mwea [96]').style.display = "block";
            document.getElementById('Gichugu [94]').style.display = "none";
            document.getElementById('Kirinyaga Central [95]').style.display = "none";
            document.getElementById('Ndia [97]').style.display = "none";
            break;
        case 'Ndia [97]':
            document.getElementById('Ndia [97]').style.display = "block";
            document.getElementById('Gichugu [94]').style.display = "none";
            document.getElementById('Kirinyaga Central [95]').style.display = "none";
            document.getElementById('Mwea [96]').style.display = "none";

            break;

        default:
            document.getElementById('Gichugu [94]').style.display = "none";
            document.getElementById('Kirinyaga Central [95]').style.display = "none";
            document.getElementById('Mwea [96]').style.display = "none";
            document.getElementById('Ndia [97]').style.display = "none";

    }
}
//for Kisii Wards
function showKissWard(select) {
    switch (select.value) {
        case 'Bobasi [98]':
            document.getElementById('Bobasi [98]').style.display = "block";
            document.getElementById('Bomachoge Borabu [99]').style.display = "none";
            document.getElementById('Bomachoge Chache [100]').style.display = "none";
            document.getElementById('Bonchari [101]').style.display = "none";
            document.getElementById('Kitutu Chache North [102]').style.display = "none";
            document.getElementById('Kitutu Chache South [103]').style.display = "none";
            document.getElementById('Nyaribari Chache [104]').style.display = "none";
            document.getElementById('Nyaribari Masaba [105]').style.display = "none";
            document.getElementById('South Mugirango [106]').style.display = "none";

            break;


        case 'Bomachoge Borabu [99]':
            document.getElementById('Bomachoge Borabu [99]').style.display = "block";
            document.getElementById('Bobasi [98]').style.display = "none";
            document.getElementById('Bomachoge Chache [100]').style.display = "none";
            document.getElementById('Bonchari [101]').style.display = "none";
            document.getElementById('Kitutu Chache North [102]').style.display = "none";
            document.getElementById('Kitutu Chache South [103]').style.display = "none";
            document.getElementById('Nyaribari Chache [104]').style.display = "none";
            document.getElementById('Nyaribari Masaba [105]').style.display = "none";
            document.getElementById('South Mugirango [106]').style.display = "none";
            break;
        case 'Bomachoge Chache [100]':
            document.getElementById('Bomachoge Chache [100]').style.display = "block";
            document.getElementById('Bobasi [98]').style.display = "none";
            document.getElementById('Bomachoge Borabu [99]').style.display = "none";
            document.getElementById('Bonchari [101]').style.display = "none";
            document.getElementById('Kitutu Chache North [102]').style.display = "none";
            document.getElementById('Kitutu Chache South [103]').style.display = "none";
            document.getElementById('Nyaribari Chache [104]').style.display = "none";
            document.getElementById('Nyaribari Masaba [105]').style.display = "none";
            document.getElementById('South Mugirango [106]').style.display = "none";
            break;
        case 'Bonchari [101]':
            document.getElementById('Bonchari [101]').style.display = "block";
            document.getElementById('Bobasi [98]').style.display = "none";
            document.getElementById('Bomachoge Borabu [99]').style.display = "none";
            document.getElementById('Bomachoge Chache [100]').style.display = "none";
            document.getElementById('Kitutu Chache North [102]').style.display = "none";
            document.getElementById('Kitutu Chache South [103]').style.display = "none";
            document.getElementById('Nyaribari Chache [104]').style.display = "none";
            document.getElementById('Nyaribari Masaba [105]').style.display = "none";
            document.getElementById('South Mugirango [106]').style.display = "none";
            break;
        case 'Kitutu Chache North [102]':
            document.getElementById('Kitutu Chache North [102]').style.display = "block";
            document.getElementById('Bobasi [98]').style.display = "none";
            document.getElementById('Bomachoge Borabu [99]').style.display = "none";
            document.getElementById('Bomachoge Chache [100]').style.display = "none";
            document.getElementById('Bonchari [101]').style.display = "none";
            document.getElementById('Kitutu Chache South [103]').style.display = "none";
            document.getElementById('Nyaribari Chache [104]').style.display = "none";
            document.getElementById('Nyaribari Masaba [105]').style.display = "none";
            document.getElementById('South Mugirango [106]').style.display = "none";
            break;
        case 'Kitutu Chache South [103]':
            document.getElementById('Kitutu Chache South [103]').style.display = "block";
            document.getElementById('Bobasi [98]').style.display = "none";
            document.getElementById('Bomachoge Borabu [99]').style.display = "none";
            document.getElementById('Bomachoge Chache [100]').style.display = "none";
            document.getElementById('Bonchari [101]').style.display = "none";
            document.getElementById('Kitutu Chache North [102]').style.display = "none";
            document.getElementById('Nyaribari Chache [104]').style.display = "none";
            document.getElementById('Nyaribari Masaba [105]').style.display = "none";
            document.getElementById('South Mugirango [106]').style.display = "none";
            break;
        case 'Nyaribari Chache [104]':
            document.getElementById('Nyaribari Chache [104]').style.display = "block";
            document.getElementById('Bobasi [98]').style.display = "none";
            document.getElementById('Bomachoge Borabu [99]').style.display = "none";
            document.getElementById('Bomachoge Chache [100]').style.display = "none";
            document.getElementById('Bonchari [101]').style.display = "none";
            document.getElementById('Kitutu Chache North [102]').style.display = "none";
            document.getElementById('Kitutu Chache South [103]').style.display = "none";
            document.getElementById('Nyaribari Masaba [105]').style.display = "none";
            document.getElementById('South Mugirango [106]').style.display = "none";
            break;
        case 'Nyaribari Masaba [105]':
            document.getElementById('Nyaribari Masaba [105]').style.display = "block";
            document.getElementById('Bobasi [98]').style.display = "none";
            document.getElementById('Bomachoge Borabu [99]').style.display = "none";
            document.getElementById('Bomachoge Chache [100]').style.display = "none";
            document.getElementById('Bonchari [101]').style.display = "none";
            document.getElementById('Kitutu Chache North [102]').style.display = "none";
            document.getElementById('Kitutu Chache South [103]').style.display = "none";
            document.getElementById('Nyaribari Chache [104]').style.display = "none";
            document.getElementById('South Mugirango [106]').style.display = "none";
            break;
        case 'South Mugirango [106]':
            document.getElementById('South Mugirango [106]').style.display = "block";
            document.getElementById('Bobasi [98]').style.display = "none";
            document.getElementById('Bomachoge Borabu [99]').style.display = "none";
            document.getElementById('Bomachoge Chache [100]').style.display = "none";
            document.getElementById('Bonchari [101]').style.display = "none";
            document.getElementById('Kitutu Chache North [102]').style.display = "none";
            document.getElementById('Kitutu Chache South [103]').style.display = "none";
            document.getElementById('Nyaribari Chache [104]').style.display = "none";
            document.getElementById('Nyaribari Masaba [105]').style.display = "none";

            break;

        default:
            document.getElementById('Bobasi [98]').style.display = "none";
            document.getElementById('Bomachoge Borabu [99]').style.display = "none";
            document.getElementById('Bomachoge Chache [100]').style.display = "none";
            document.getElementById('Bonchari [101]').style.display = "none";
            document.getElementById('Kitutu Chache North [102]').style.display = "none";
            document.getElementById('Kitutu Chache South [103]').style.display = "none";
            document.getElementById('Nyaribari Chache [104]').style.display = "none";
            document.getElementById('Nyaribari Masaba [105]').style.display = "none";
            document.getElementById('South Mugirango [106]').style.display = "none";

    }
}
// for Kisumu Wards
function showKisWard(select) {
    switch (select.value) {
        case 'Kisumu Central [107]':
            document.getElementById('Kisumu Central [107]').style.display = "block";
            document.getElementById('Kisumu East [108]').style.display = "none";
            document.getElementById('Kisumu West [109]').style.display = "none";
            document.getElementById('Muhoroni [110]').style.display = "none";
            document.getElementById('Nyakach [111]').style.display = "none";
            document.getElementById('Nyando [112]').style.display = "none";
            document.getElementById('Seme [113]').style.display = "none";

            break;


        case 'Kisumu East [108]':
            document.getElementById('Kisumu East [108]').style.display = "block";
            document.getElementById('Kisumu Central [107]').style.display = "none";
            document.getElementById('Kisumu West [109]').style.display = "none";
            document.getElementById('Muhoroni [110]').style.display = "none";
            document.getElementById('Nyakach [111]').style.display = "none";
            document.getElementById('Nyando [112]').style.display = "none";
            document.getElementById('Seme [113]').style.display = "none";
            break;
        case 'Kisumu West [109]':
            document.getElementById('Kisumu West [109]').style.display = "block";
            document.getElementById('Kisumu Central [107]').style.display = "none";
            document.getElementById('Kisumu East [108]').style.display = "none";
            document.getElementById('Muhoroni [110]').style.display = "none";
            document.getElementById('Nyakach [111]').style.display = "none";
            document.getElementById('Nyando [112]').style.display = "none";
            document.getElementById('Seme [113]').style.display = "none";
            break;
        case 'Muhoroni [110]':
            document.getElementById('Muhoroni [110]').style.display = "block";
            document.getElementById('Kisumu Central [107]').style.display = "none";
            document.getElementById('Kisumu East [108]').style.display = "none";
            document.getElementById('Kisumu West [109]').style.display = "none";
            document.getElementById('Nyakach [111]').style.display = "none";
            document.getElementById('Nyando [112]').style.display = "none";
            document.getElementById('Seme [113]').style.display = "none";
            break;
        case 'Nyakach [111]':
            document.getElementById('Nyakach [111]').style.display = "block";
            document.getElementById('Kisumu Central [107]').style.display = "none";
            document.getElementById('Kisumu East [108]').style.display = "none";
            document.getElementById('Kisumu West [109]').style.display = "none";
            document.getElementById('Muhoroni [110]').style.display = "none";
            document.getElementById('Nyando [112]').style.display = "none";
            document.getElementById('Seme [113]').style.display = "none";
            break;
        case 'Nyando [112]':
            document.getElementById('Nyando [112]').style.display = "block";
            document.getElementById('Kisumu Central [107]').style.display = "none";
            document.getElementById('Kisumu East [108]').style.display = "none";
            document.getElementById('Kisumu West [109]').style.display = "none";
            document.getElementById('Muhoroni [110]').style.display = "none";
            document.getElementById('Nyakach [111]').style.display = "none";
            document.getElementById('Seme [113]').style.display = "none";
            break;
        case 'Seme [113]':
            document.getElementById('Seme [113]').style.display = "block";
            document.getElementById('Kisumu Central [107]').style.display = "none";
            document.getElementById('Kisumu East [108]').style.display = "none";
            document.getElementById('Kisumu West [109]').style.display = "none";
            document.getElementById('Muhoroni [110]').style.display = "none";
            document.getElementById('Nyakach [111]').style.display = "none";
            document.getElementById('Nyando [112]').style.display = "none";
            break;


        default:
            document.getElementById('Kisumu Central [107]').style.display = "none";
            document.getElementById('Kisumu East [108]').style.display = "none";
            document.getElementById('Kisumu West [109]').style.display = "none";
            document.getElementById('Muhoroni [110]').style.display = "none";
            document.getElementById('Nyakach [111]').style.display = "none";
            document.getElementById('Nyando [112]').style.display = "none";
            document.getElementById('Seme [113]').style.display = "none";

    }
}
//For Kitui wards
function showKitWard(select) {
    switch (select.value) {
        case 'Kitui Central [114]':
            document.getElementById('Kitui Central [114]').style.display = "block";
            document.getElementById('Kitui East [115]').style.display = "none";
            document.getElementById('Kitui Rural [116]').style.display = "none";
            document.getElementById('Kitui South [117]').style.display = "none";
            document.getElementById('Kitui West [118]').style.display = "none";
            document.getElementById('Mwingi East [119]').style.display = "none";
            document.getElementById('Mwingi North [120]').style.display = "none";
            document.getElementById('Mwingi West [121]').style.display = "none";
            document.getElementById('Mwingi Central').style.display = "none";
            break;


        case 'Kitui East [115]':
            document.getElementById('Kitui East [115]').style.display = "block";
            document.getElementById('Kitui Central [114]').style.display = "none";
            document.getElementById('Kitui Rural [116]').style.display = "none";
            document.getElementById('Kitui South [117]').style.display = "none";
            document.getElementById('Kitui West [118]').style.display = "none";
            document.getElementById('Mwingi East [119]').style.display = "none";
            document.getElementById('Mwingi North [120]').style.display = "none";
            document.getElementById('Mwingi West [121]').style.display = "none";
            document.getElementById('Mwingi Central').style.display = "none";
            break;
        case 'Kitui Rural [116]':
            document.getElementById('Kitui Rural [116]').style.display = "block";
            document.getElementById('Kitui Central [114]').style.display = "none";
            document.getElementById('Kitui East [115]').style.display = "none";
            document.getElementById('Kitui South [117]').style.display = "none";
            document.getElementById('Kitui West [118]').style.display = "none";
            document.getElementById('Mwingi East [119]').style.display = "none";
            document.getElementById('Mwingi North [120]').style.display = "none";
            document.getElementById('Mwingi West [121]').style.display = "none";
            document.getElementById('Mwingi Central').style.display = "none";
            break;
        case 'Kitui South [117]':
            document.getElementById('Kitui South [117]').style.display = "block";
            document.getElementById('Kitui Central [114]').style.display = "none";
            document.getElementById('Kitui East [115]').style.display = "none";
            document.getElementById('Kitui Rural [116]').style.display = "none";
            document.getElementById('Kitui West [118]').style.display = "none";
            document.getElementById('Mwingi East [119]').style.display = "none";
            document.getElementById('Mwingi North [120]').style.display = "none";
            document.getElementById('Mwingi West [121]').style.display = "none";
            document.getElementById('Mwingi Central').style.display = "none";
            break;
        case 'Kitui West [118]':
            document.getElementById('Kitui West [118]').style.display = "block";
            document.getElementById('Kitui Central [114]').style.display = "none";
            document.getElementById('Kitui East [115]').style.display = "none";
            document.getElementById('Kitui Rural [116]').style.display = "none";
            document.getElementById('Kitui South [117]').style.display = "none";
            document.getElementById('Mwingi East [119]').style.display = "none";
            document.getElementById('Mwingi North [120]').style.display = "none";
            document.getElementById('Mwingi West [121]').style.display = "none";
            document.getElementById('Mwingi Central').style.display = "none";
            break;
        case 'Mwingi East [119]':
            document.getElementById('Mwingi East [119]').style.display = "block";
            document.getElementById('Kitui Central [114]').style.display = "none";
            document.getElementById('Kitui East [115]').style.display = "none";
            document.getElementById('Kitui Rural [116]').style.display = "none";
            document.getElementById('Kitui South [117]').style.display = "none";
            document.getElementById('Kitui West [118]').style.display = "none";
            document.getElementById('Mwingi North [120]').style.display = "none";
            document.getElementById('Mwingi West [121]').style.display = "none";
            document.getElementById('Mwingi Central').style.display = "none";
            break;
        case 'Mwingi North [120]':
            document.getElementById('Mwingi North [120]').style.display = "block";
            document.getElementById('Kitui Central [114]').style.display = "none";
            document.getElementById('Kitui East [115]').style.display = "none";
            document.getElementById('Kitui Rural [116]').style.display = "none";
            document.getElementById('Kitui South [117]').style.display = "none";
            document.getElementById('Kitui West [118]').style.display = "none";
            document.getElementById('Mwingi East [119]').style.display = "none";
            document.getElementById('Mwingi West [121]').style.display = "none";
            document.getElementById('Mwingi Central').style.display = "none";
            break;

        case 'Mwingi West [121]':
            document.getElementById('Mwingi West [121]').style.display = "block";
            document.getElementById('Kitui Central [114]').style.display = "none";
            document.getElementById('Kitui East [115]').style.display = "none";
            document.getElementById('Kitui Rural [116]').style.display = "none";
            document.getElementById('Kitui South [117]').style.display = "none";
            document.getElementById('Kitui West [118]').style.display = "none";
            document.getElementById('Mwingi East [119]').style.display = "none";
            document.getElementById('Mwingi North [120]').style.display = "none";
            document.getElementById('Mwingi Central').style.display = "none";
            break;
        case 'Mwingi Central':
            document.getElementById('Mwingi Central').style.display = "block";
            document.getElementById('Mwingi West [121]').style.display = "none";
            document.getElementById('Kitui Central [114]').style.display = "none";
            document.getElementById('Kitui East [115]').style.display = "none";
            document.getElementById('Kitui Rural [116]').style.display = "none";
            document.getElementById('Kitui South [117]').style.display = "none";
            document.getElementById('Kitui West [118]').style.display = "none";
            document.getElementById('Mwingi East [119]').style.display = "none";
            document.getElementById('Mwingi North [120]').style.display = "none";
            break;

        default:
            document.getElementById('Kitui Central [114]').style.display = "none";
            document.getElementById('Kitui East [115]').style.display = "none";
            document.getElementById('Kitui Rural [116]').style.display = "none";
            document.getElementById('Kitui South [117]').style.display = "none";
            document.getElementById('Kitui West [118]').style.display = "none";
            document.getElementById('Mwingi East [119]').style.display = "none";
            document.getElementById('Mwingi North [120]').style.display = "none";
            document.getElementById('Mwingi West [121]').style.display = "none";
            document.getElementById('Mwingi Central').style.display = "none";
    }
}
//for Kwale Wards
function showKwalWard(select) {
    switch (select.value) {
        case 'Kinango [122]':
            document.getElementById('Kinango [122]').style.display = "block";
            document.getElementById('Lunga Lunga [123]').style.display = "none";
            document.getElementById('Matuga [124]').style.display = "none";
            document.getElementById('Msambweni [125]').style.display = "none";

            break;


        case 'Lunga Lunga [123]':
            document.getElementById('Lunga Lunga [123]').style.display = "block";
            document.getElementById('Kinango [122]').style.display = "none";
            document.getElementById('Matuga [124]').style.display = "none";
            document.getElementById('Msambweni [125]').style.display = "none";
            break;
        case 'Matuga [124]':
            document.getElementById('Matuga [124]').style.display = "block";
            document.getElementById('Kinango [122]').style.display = "none";
            document.getElementById('Lunga Lunga [123]').style.display = "none";
            document.getElementById('Msambweni [125]').style.display = "none";
            break;
        case 'Msambweni [125]':
            document.getElementById('Msambweni [125]').style.display = "block";
            document.getElementById('Kinango [122]').style.display = "none";
            document.getElementById('Lunga Lunga [123]').style.display = "none";
            document.getElementById('Matuga [124]').style.display = "none";

            break;


        default:
            document.getElementById('Kinango [122]').style.display = "none";
            document.getElementById('Lunga Lunga [123]').style.display = "none";
            document.getElementById('Matuga [124]').style.display = "none";
            document.getElementById('Msambweni [125]').style.display = "none";
    }
}
// For Laikipia wards
function showLaiWard(select) {
    switch (select.value) {
        case 'Laikipia East [126]':
            document.getElementById('Laikipia East [126]').style.display = "block";
            document.getElementById('Laikipia North [127]').style.display = "none";
            document.getElementById('Laikipia West [128]').style.display = "none";

            break;


        case 'Laikipia North [127]':
            document.getElementById('Laikipia North [127]').style.display = "block";
            document.getElementById('Laikipia East [126]').style.display = "none";
            document.getElementById('Laikipia West [128]').style.display = "none";
            break;
        case 'Laikipia West [128]':
            document.getElementById('Laikipia West [128]').style.display = "block";
            document.getElementById('Laikipia East [126]').style.display = "none";
            document.getElementById('Laikipia North [127]').style.display = "none";

            break;

        default:
            document.getElementById('Laikipia East [126]').style.display = "none";
            document.getElementById('Laikipia North [127]').style.display = "none";
            document.getElementById('Laikipia West [128]').style.display = "none";

    }
}
//For Lamu Wards
function showLaWard(select) {
    switch (select.value) {
        case 'Lamu East [129]':
            document.getElementById('Lamu East [129]').style.display = "block";
            document.getElementById('Lamu West [130]').style.display = "none";

            break;


        case 'Lamu West [130]':
            document.getElementById('Lamu West [130]').style.display = "block";
            document.getElementById('Lamu East [129]').style.display = "none";

            break;


        default:
            document.getElementById('Lamu East [129]').style.display = "none";
            document.getElementById('Lamu West [130]').style.display = "none";


    }
}
// For Machakos Wards
function showMachaWard(select) {
    switch (select.value) {
        case 'Kangundo [131]':
            document.getElementById('Kangundo [131]').style.display = "block";
            document.getElementById('Kathiani [132]').style.display = "none";
            document.getElementById('Machakos Town [133]').style.display = "none";
            document.getElementById('Masinga [134]').style.display = "none";
            document.getElementById('Matungulu [135]').style.display = "none";
            document.getElementById('Mavoko [136]').style.display = "none";
            document.getElementById('Mwala [137]').style.display = "none";
            document.getElementById('Yatta [138]').style.display = "none";

            break;


        case 'Kathiani [132]':
            document.getElementById('Kathiani [132]').style.display = "block";
            document.getElementById('Kangundo [131]').style.display = "none";
            document.getElementById('Machakos Town [133]').style.display = "none";
            document.getElementById('Masinga [134]').style.display = "none";
            document.getElementById('Matungulu [135]').style.display = "none";
            document.getElementById('Mavoko [136]').style.display = "none";
            document.getElementById('Mwala [137]').style.display = "none";
            document.getElementById('Yatta [138]').style.display = "none";
            break;
        case 'Machakos Town [133]':
            document.getElementById('Machakos Town [133]').style.display = "block";
            document.getElementById('Kangundo [131]').style.display = "none";
            document.getElementById('Kathiani [132]').style.display = "none";
            document.getElementById('Masinga [134]').style.display = "none";
            document.getElementById('Matungulu [135]').style.display = "none";
            document.getElementById('Mavoko [136]').style.display = "none";
            document.getElementById('Mwala [137]').style.display = "none";
            document.getElementById('Yatta [138]').style.display = "none";
            break;

        case 'Masinga [134]':
            document.getElementById('Masinga [134]').style.display = "block";
            document.getElementById('Kangundo [131]').style.display = "none";
            document.getElementById('Kathiani [132]').style.display = "none";
            document.getElementById('Machakos Town [133]').style.display = "none";
            document.getElementById('Matungulu [135]').style.display = "none";
            document.getElementById('Mavoko [136]').style.display = "none";
            document.getElementById('Mwala [137]').style.display = "none";
            document.getElementById('Yatta [138]').style.display = "none";
            break;

        case 'Matungulu [135]':
            document.getElementById('Matungulu [135]').style.display = "block";
            document.getElementById('Kangundo [131]').style.display = "none";
            document.getElementById('Kathiani [132]').style.display = "none";
            document.getElementById('Machakos Town [133]').style.display = "none";
            document.getElementById('Masinga [134]').style.display = "none";
            document.getElementById('Mavoko [136]').style.display = "none";
            document.getElementById('Mwala [137]').style.display = "none";
            document.getElementById('Yatta [138]').style.display = "none";
            break;

        case 'Mavoko [136]':
            document.getElementById('Mavoko [136]').style.display = "block";
            document.getElementById('Kangundo [131]').style.display = "none";
            document.getElementById('Kathiani [132]').style.display = "none";
            document.getElementById('Machakos Town [133]').style.display = "none";
            document.getElementById('Masinga [134]').style.display = "none";
            document.getElementById('Matungulu [135]').style.display = "none";
            document.getElementById('Mwala [137]').style.display = "none";
            document.getElementById('Yatta [138]').style.display = "none";
            break;

        case 'Mwala [137]':
            document.getElementById('Mwala [137]').style.display = "block";
            document.getElementById('Kangundo [131]').style.display = "none";
            document.getElementById('Kathiani [132]').style.display = "none";
            document.getElementById('Machakos Town [133]').style.display = "none";
            document.getElementById('Masinga [134]').style.display = "none";
            document.getElementById('Matungulu [135]').style.display = "none";
            document.getElementById('Mavoko [136]').style.display = "none";
            document.getElementById('Yatta [138]').style.display = "none";
            break;

        case 'Yatta [138]':
            document.getElementById('Yatta [138]').style.display = "block";
            document.getElementById('Kangundo [131]').style.display = "none";
            document.getElementById('Kathiani [132]').style.display = "none";
            document.getElementById('Machakos Town [133]').style.display = "none";
            document.getElementById('Masinga [134]').style.display = "none";
            document.getElementById('Matungulu [135]').style.display = "none";
            document.getElementById('Mavoko [136]').style.display = "none";
            document.getElementById('Mwala [137]').style.display = "none";

            break;



        default:
            document.getElementById('Kangundo [131]').style.display = "none";
            document.getElementById('Kathiani [132]').style.display = "none";
            document.getElementById('Machakos Town [133]').style.display = "none";
            document.getElementById('Masinga [134]').style.display = "none";
            document.getElementById('Matungulu [135]').style.display = "none";
            document.getElementById('Mavoko [136]').style.display = "none";
            document.getElementById('Mwala [137]').style.display = "none";
            document.getElementById('Yatta [138]').style.display = "none";

    }
}
//For Makueni wards
function showMakuWard(select) {
    switch (select.value) {
        case 'Kaiti [139]':
            document.getElementById('Kaiti [139]').style.display = "block";
            document.getElementById('Kibwezi East [140]').style.display = "none";
            document.getElementById('Kibwezi West [141]').style.display = "none";
            document.getElementById('Kilome [142]').style.display = "none";
            document.getElementById('Makueni [143]').style.display = "none";
            document.getElementById('Mbooni [144]').style.display = "none";

            break;


        case 'Kibwezi East [140]':
            document.getElementById('Kibwezi East [140]').style.display = "block";
            document.getElementById('Kaiti [139]').style.display = "none";
            document.getElementById('Kibwezi West [141]').style.display = "none";
            document.getElementById('Kilome [142]').style.display = "none";
            document.getElementById('Makueni [143]').style.display = "none";
            document.getElementById('Mbooni [144]').style.display = "none";

            break;
        case 'Kibwezi West [141]':
            document.getElementById('Kibwezi West [141]').style.display = "block";
            document.getElementById('Kaiti [139]').style.display = "none";
            document.getElementById('Kibwezi East [140]').style.display = "none";
            document.getElementById('Kilome [142]').style.display = "none";
            document.getElementById('Makueni [143]').style.display = "none";
            document.getElementById('Mbooni [144]').style.display = "none";

            break;

        case 'Kilome [142]':
            document.getElementById('Kilome [142]').style.display = "block";
            document.getElementById('Kaiti [139]').style.display = "none";
            document.getElementById('Kibwezi East [140]').style.display = "none";
            document.getElementById('Kibwezi West [141]').style.display = "none";
            document.getElementById('Makueni [143]').style.display = "none";
            document.getElementById('Mbooni [144]').style.display = "none";

            break;

        case 'Makueni [143]':
            document.getElementById('Makueni [143]').style.display = "block";
            document.getElementById('Kaiti [139]').style.display = "none";
            document.getElementById('Kibwezi East [140]').style.display = "none";
            document.getElementById('Kibwezi West [141]').style.display = "none";
            document.getElementById('Kilome [142]').style.display = "none";
            document.getElementById('Mbooni [144]').style.display = "none";

            break;

        case 'Mbooni [144]':
            document.getElementById('Mbooni [144]').style.display = "block";
            document.getElementById('Kaiti [139]').style.display = "none";
            document.getElementById('Kibwezi East [140]').style.display = "none";
            document.getElementById('Kibwezi West [141]').style.display = "none";
            document.getElementById('Kilome [142]').style.display = "none";
            document.getElementById('Makueni [143]').style.display = "none";


            break;



        default:
            document.getElementById('Kaiti [139]').style.display = "none";
            document.getElementById('Kibwezi East [140]').style.display = "none";
            document.getElementById('Kibwezi West [141]').style.display = "none";
            document.getElementById('Kilome [142]').style.display = "none";
            document.getElementById('Makueni [143]').style.display = "none";
            document.getElementById('Mbooni [144]').style.display = "none";

    }
}
// for Mandera Wards
function showMandWard(select) {
    switch (select.value) {
        case 'Banissa [145]':
            document.getElementById('Banissa [145]').style.display = "block";
            document.getElementById('Lafey [146]').style.display = "none";
            document.getElementById('Mandera East [147]').style.display = "none";
            document.getElementById('Mandera North [148]').style.display = "none";
            document.getElementById('Mandera South [149]').style.display = "none";
            document.getElementById('Mandera West [150]').style.display = "none";

            break;


        case 'Lafey [146]':
            document.getElementById('Lafey [146]').style.display = "block";
            document.getElementById('Banissa [145]').style.display = "none";
            document.getElementById('Mandera East [147]').style.display = "none";
            document.getElementById('Mandera North [148]').style.display = "none";
            document.getElementById('Mandera South [149]').style.display = "none";
            document.getElementById('Mandera West [150]').style.display = "none";

            break;
        case 'Mandera East [147]':
            document.getElementById('Mandera East [147]').style.display = "block";
            document.getElementById('Banissa [145]').style.display = "none";
            document.getElementById('Lafey [146]').style.display = "none";
            document.getElementById('Mandera North [148]').style.display = "none";
            document.getElementById('Mandera South [149]').style.display = "none";
            document.getElementById('Mandera West [150]').style.display = "none";

            break;

        case 'Mandera North [148]':
            document.getElementById('Mandera North [148]').style.display = "block";
            document.getElementById('Banissa [145]').style.display = "none";
            document.getElementById('Lafey [146]').style.display = "none";
            document.getElementById('Mandera East [147]').style.display = "none";
            document.getElementById('Mandera South [149]').style.display = "none";
            document.getElementById('Mandera West [150]').style.display = "none";

            break;

        case 'Mandera South [149]':
            document.getElementById('Mandera South [149]').style.display = "block";
            document.getElementById('Banissa [145]').style.display = "none";
            document.getElementById('Lafey [146]').style.display = "none";
            document.getElementById('Mandera East [147]').style.display = "none";
            document.getElementById('Mandera North [148]').style.display = "none";
            document.getElementById('Mandera West [150]').style.display = "none";

            break;

        case 'Mandera West [150]':
            document.getElementById('Mandera West [150]').style.display = "block";
            document.getElementById('Banissa [145]').style.display = "none";
            document.getElementById('Lafey [146]').style.display = "none";
            document.getElementById('Mandera East [147]').style.display = "none";
            document.getElementById('Mandera North [148]').style.display = "none";
            document.getElementById('Mandera South [149]').style.display = "none";

            break;



        default:
            document.getElementById('Banissa [145]').style.display = "none";
            document.getElementById('Lafey [146]').style.display = "none";
            document.getElementById('Mandera East [147]').style.display = "none";
            document.getElementById('Mandera North [148]').style.display = "none";
            document.getElementById('Mandera South [149]').style.display = "none";
            document.getElementById('Mandera West [150]').style.display = "none";

    }
}
//For Marsabit Wards
function showMarWard(select) {
    switch (select.value) {
        case 'Laisamis [151]':
            document.getElementById('Laisamis [151]').style.display = "block";
            document.getElementById('Moyale [152]').style.display = "none";
            document.getElementById('North Horr [153]').style.display = "none";
            document.getElementById('Saku [154]').style.display = "none";

            break;


        case 'Moyale [152]':
            document.getElementById('Moyale [152]').style.display = "block";
            document.getElementById('Laisamis [151]').style.display = "none";
            document.getElementById('North Horr [153]').style.display = "none";
            document.getElementById('Saku [154]').style.display = "none";
            break;
        case 'North Horr [153]':
            document.getElementById('North Horr [153]').style.display = "block";
            document.getElementById('Laisamis [151]').style.display = "none";
            document.getElementById('Moyale [152]').style.display = "none";
            document.getElementById('Saku [154]').style.display = "none";

            break;

        case 'Saku [154]':
            document.getElementById('Saku [154]').style.display = "block"
            document.getElementById('Laisamis [151]').style.display = "none";
            document.getElementById('Moyale [152]').style.display = "none";
            document.getElementById('North Horr [153]').style.display = "none";;
            break;




        default:
            document.getElementById('Laisamis [151]').style.display = "none";
            document.getElementById('Moyale [152]').style.display = "none";
            document.getElementById('North Horr [153]').style.display = "none";
            document.getElementById('Saku [154]').style.display = "none";
    }
}
// For Meru Wards
function showMerWard(select) {
    switch (select.value) {
        case 'Buuri [155]':
            document.getElementById('Buuri [155]').style.display = "block";
            document.getElementById('Central Imenti [156]').style.display = "none";
            document.getElementById('Igembe Central [157]').style.display = "none";
            document.getElementById('Igembe North [158]').style.display = "none";
            document.getElementById('Igembe South [159]').style.display = "none";
            document.getElementById('North Imenti [160]').style.display = "none";
            document.getElementById('South Imenti [161]').style.display = "none";
            document.getElementById('Tigania East [162]').style.display = "none";
            document.getElementById('Tigania West [163]').style.display = "none";

            break;


        case 'Central Imenti [156]':
            document.getElementById('Central Imenti [156]').style.display = "block";
            document.getElementById('Buuri [155]').style.display = "none";
            document.getElementById('Igembe Central [157]').style.display = "none";
            document.getElementById('Igembe North [158]').style.display = "none";
            document.getElementById('Igembe South [159]').style.display = "none";
            document.getElementById('North Imenti [160]').style.display = "none";
            document.getElementById('South Imenti [161]').style.display = "none";
            document.getElementById('Tigania East [162]').style.display = "none";
            document.getElementById('Tigania West [163]').style.display = "none";
            break;
        case 'Igembe Central [157]':
            document.getElementById('Igembe Central [157]').style.display = "block";
            document.getElementById('Buuri [155]').style.display = "none";
            document.getElementById('Central Imenti [156]').style.display = "none";
            document.getElementById('Igembe North [158]').style.display = "none";
            document.getElementById('Igembe South [159]').style.display = "none";
            document.getElementById('North Imenti [160]').style.display = "none";
            document.getElementById('South Imenti [161]').style.display = "none";
            document.getElementById('Tigania East [162]').style.display = "none";
            document.getElementById('Tigania West [163]').style.display = "none";

            break;

        case 'Igembe North [158]':
            document.getElementById('Igembe North [158]').style.display = "block";
            document.getElementById('Buuri [155]').style.display = "none";
            document.getElementById('Central Imenti [156]').style.display = "none";
            document.getElementById('Igembe Central [157]').style.display = "none";
            document.getElementById('Igembe South [159]').style.display = "none";
            document.getElementById('North Imenti [160]').style.display = "none";
            document.getElementById('South Imenti [161]').style.display = "none";
            document.getElementById('Tigania East [162]').style.display = "none";
            document.getElementById('Tigania West [163]').style.display = "none";
            break;
        case 'Igembe South [159]':
            document.getElementById('Igembe South [159]').style.display = "block";
            document.getElementById('Buuri [155]').style.display = "none";
            document.getElementById('Central Imenti [156]').style.display = "none";
            document.getElementById('Igembe Central [157]').style.display = "none";
            document.getElementById('Igembe North [158]').style.display = "none";
            document.getElementById('North Imenti [160]').style.display = "none";
            document.getElementById('South Imenti [161]').style.display = "none";
            document.getElementById('Tigania East [162]').style.display = "none";
            document.getElementById('Tigania West [163]').style.display = "none";
            break;

        case 'North Imenti [160]':
            document.getElementById('North Imenti [160]').style.display = "block";
            document.getElementById('Buuri [155]').style.display = "none";
            document.getElementById('Central Imenti [156]').style.display = "none";
            document.getElementById('Igembe Central [157]').style.display = "none";
            document.getElementById('Igembe North [158]').style.display = "none";
            document.getElementById('Igembe South [159]').style.display = "none";
            document.getElementById('South Imenti [161]').style.display = "none";
            document.getElementById('Tigania East [162]').style.display = "none";
            document.getElementById('Tigania West [163]').style.display = "none";
            break;

        case 'South Imenti [161]':
            document.getElementById('South Imenti [161]').style.display = "block";
            document.getElementById('Buuri [155]').style.display = "none";
            document.getElementById('Central Imenti [156]').style.display = "none";
            document.getElementById('Igembe Central [157]').style.display = "none";
            document.getElementById('Igembe North [158]').style.display = "none";
            document.getElementById('Igembe South [159]').style.display = "none";
            document.getElementById('North Imenti [160]').style.display = "none";
            document.getElementById('Tigania East [162]').style.display = "none";
            document.getElementById('Tigania West [163]').style.display = "none";
            break;

        case 'Tigania East [162]':
            document.getElementById('Tigania East [162]').style.display = "block";
            document.getElementById('Buuri [155]').style.display = "none";
            document.getElementById('Central Imenti [156]').style.display = "none";
            document.getElementById('Igembe Central [157]').style.display = "none";
            document.getElementById('Igembe North [158]').style.display = "none";
            document.getElementById('Igembe South [159]').style.display = "none";
            document.getElementById('North Imenti [160]').style.display = "none";
            document.getElementById('South Imenti [161]').style.display = "none";
            document.getElementById('Tigania West [163]').style.display = "none";
            break;

        case 'Tigania West [163]':
            document.getElementById('Tigania West [163]').style.display = "block";
            document.getElementById('Buuri [155]').style.display = "none";
            document.getElementById('Central Imenti [156]').style.display = "none";
            document.getElementById('Igembe Central [157]').style.display = "none";
            document.getElementById('Igembe North [158]').style.display = "none";
            document.getElementById('Igembe South [159]').style.display = "none";
            document.getElementById('North Imenti [160]').style.display = "none";
            document.getElementById('South Imenti [161]').style.display = "none";
            document.getElementById('Tigania East [162]').style.display = "none";

            break;





        default:
            document.getElementById('Buuri [155]').style.display = "none";
            document.getElementById('Central Imenti [156]').style.display = "none";
            document.getElementById('Igembe Central [157]').style.display = "none";
            document.getElementById('Igembe North [158]').style.display = "none";
            document.getElementById('Igembe South [159]').style.display = "none";
            document.getElementById('North Imenti [160]').style.display = "none";
            document.getElementById('South Imenti [161]').style.display = "none";
            document.getElementById('Tigania East [162]').style.display = "none";
            document.getElementById('Tigania West [163]').style.display = "none";
    }
}
//for Migori Wards
function showMigWard(select) {
    switch (select.value) {
        case 'Awendo [164]':
            document.getElementById('Awendo [164]').style.display = "block";
            document.getElementById('Kuria East [165]').style.display = "none";
            document.getElementById('Kuria West [166]').style.display = "none";
            document.getElementById('Nyatike [167]').style.display = "none";
            document.getElementById('Rongo [168]').style.display = "none";
            document.getElementById('Suna East [169]').style.display = "none";
            document.getElementById('Suna West [170]').style.display = "none";
            document.getElementById('Uriri [171]').style.display = "none";

            break;


        case 'Kuria East [165]':
            document.getElementById('Kuria East [165]').style.display = "block";
            document.getElementById('Awendo [164]').style.display = "none";
            document.getElementById('Kuria West [166]').style.display = "none";
            document.getElementById('Nyatike [167]').style.display = "none";
            document.getElementById('Rongo [168]').style.display = "none";
            document.getElementById('Suna East [169]').style.display = "none";
            document.getElementById('Suna West [170]').style.display = "none";
            document.getElementById('Uriri [171]').style.display = "none";
            break;
        case 'Kuria West [166]':
            document.getElementById('Kuria West [166]').style.display = "block";
            document.getElementById('Awendo [164]').style.display = "none";
            document.getElementById('Kuria East [165]').style.display = "none";
            document.getElementById('Nyatike [167]').style.display = "none";
            document.getElementById('Rongo [168]').style.display = "none";
            document.getElementById('Suna East [169]').style.display = "none";
            document.getElementById('Suna West [170]').style.display = "none";
            document.getElementById('Uriri [171]').style.display = "none";

            break;

        case 'Nyatike [167]':
            document.getElementById('Nyatike [167]').style.display = "block";
            document.getElementById('Awendo [164]').style.display = "none";
            document.getElementById('Kuria East [165]').style.display = "none";
            document.getElementById('Kuria West [166]').style.display = "none";
            document.getElementById('Rongo [168]').style.display = "none";
            document.getElementById('Suna East [169]').style.display = "none";
            document.getElementById('Suna West [170]').style.display = "none";
            document.getElementById('Uriri [171]').style.display = "none";
            break;
        case 'Rongo [168]':
            document.getElementById('Rongo [168]').style.display = "block";
            document.getElementById('Awendo [164]').style.display = "none";
            document.getElementById('Kuria East [165]').style.display = "none";
            document.getElementById('Kuria West [166]').style.display = "none";
            document.getElementById('Nyatike [167]').style.display = "none";
            document.getElementById('Suna East [169]').style.display = "none";
            document.getElementById('Suna West [170]').style.display = "none";
            document.getElementById('Uriri [171]').style.display = "none";
            break;

        case 'Suna East [169]':
            document.getElementById('Suna East [169]').style.display = "block";
            document.getElementById('Awendo [164]').style.display = "none";
            document.getElementById('Kuria East [165]').style.display = "none";
            document.getElementById('Kuria West [166]').style.display = "none";
            document.getElementById('Nyatike [167]').style.display = "none";
            document.getElementById('Rongo [168]').style.display = "none";
            document.getElementById('Suna West [170]').style.display = "none";
            document.getElementById('Uriri [171]').style.display = "none";
            break;

        case 'Suna West [170]':
            document.getElementById('Suna West [170]').style.display = "block";
            document.getElementById('Awendo [164]').style.display = "none";
            document.getElementById('Kuria East [165]').style.display = "none";
            document.getElementById('Kuria West [166]').style.display = "none";
            document.getElementById('Nyatike [167]').style.display = "none";
            document.getElementById('Rongo [168]').style.display = "none";
            document.getElementById('Suna East [169]').style.display = "none";
            document.getElementById('Uriri [171]').style.display = "none";
            break;

        case 'Uriri [171]':
            document.getElementById('Uriri [171]').style.display = "block";
            document.getElementById('Awendo [164]').style.display = "none";
            document.getElementById('Kuria East [165]').style.display = "none";
            document.getElementById('Kuria West [166]').style.display = "none";
            document.getElementById('Nyatike [167]').style.display = "none";
            document.getElementById('Rongo [168]').style.display = "none";
            document.getElementById('Suna East [169]').style.display = "none";
            document.getElementById('Suna West [170]').style.display = "none";

            break;



        default:
            document.getElementById('Awendo [164]').style.display = "none";
            document.getElementById('Kuria East [165]').style.display = "none";
            document.getElementById('Kuria West [166]').style.display = "none";
            document.getElementById('Nyatike [167]').style.display = "none";
            document.getElementById('Rongo [168]').style.display = "none";
            document.getElementById('Suna East [169]').style.display = "none";
            document.getElementById('Suna West [170]').style.display = "none";
            document.getElementById('Uriri [171]').style.display = "none";
    }
}
//for Mombasa Wards
function showMoWard(select) {
    switch (select.value) {
        case 'Changamwe [172]':
            document.getElementById('Changamwe [172]').style.display = "block";
            document.getElementById('Jomvu [173]').style.display = "none";
            document.getElementById('Kisauni [174]').style.display = "none";
            document.getElementById('Likoni [175]').style.display = "none";
            document.getElementById('Mvita [176]').style.display = "none";
            document.getElementById('Nyali [177]').style.display = "none";

            break;


        case 'Jomvu [173]':
            document.getElementById('Jomvu [173]').style.display = "block";
            document.getElementById('Changamwe [172]').style.display = "none";
            document.getElementById('Kisauni [174]').style.display = "none";
            document.getElementById('Likoni [175]').style.display = "none";
            document.getElementById('Mvita [176]').style.display = "none";
            document.getElementById('Nyali [177]').style.display = "none";
            break;
        case 'Kisauni [174]':
            document.getElementById('Kisauni [174]').style.display = "block";
            document.getElementById('Changamwe [172]').style.display = "none";
            document.getElementById('Jomvu [173]').style.display = "none";
            document.getElementById('Likoni [175]').style.display = "none";
            document.getElementById('Mvita [176]').style.display = "none";
            document.getElementById('Nyali [177]').style.display = "none";

            break;

        case 'Likoni [175]':
            document.getElementById('Likoni [175]').style.display = "block";
            document.getElementById('Changamwe [172]').style.display = "none";
            document.getElementById('Jomvu [173]').style.display = "none";
            document.getElementById('Kisauni [174]').style.display = "none";
            document.getElementById('Mvita [176]').style.display = "none";
            document.getElementById('Nyali [177]').style.display = "none";
            break;
        case 'Mvita [176]':
            document.getElementById('Mvita [176]').style.display = "block";
            document.getElementById('Changamwe [172]').style.display = "none";
            document.getElementById('Jomvu [173]').style.display = "none";
            document.getElementById('Kisauni [174]').style.display = "none";
            document.getElementById('Likoni [175]').style.display = "none";
            document.getElementById('Nyali [177]').style.display = "none";
            break;

        case 'Nyali [177]':
            document.getElementById('Nyali [177]').style.display = "block";
            document.getElementById('Changamwe [172]').style.display = "none";
            document.getElementById('Jomvu [173]').style.display = "none";
            document.getElementById('Kisauni [174]').style.display = "none";
            document.getElementById('Likoni [175]').style.display = "none";
            document.getElementById('Mvita [176]').style.display = "none";

            break;


        default:
            document.getElementById('Changamwe [172]').style.display = "none";
            document.getElementById('Jomvu [173]').style.display = "none";
            document.getElementById('Kisauni [174]').style.display = "none";
            document.getElementById('Likoni [175]').style.display = "none";
            document.getElementById('Mvita [176]').style.display = "none";
            document.getElementById('Nyali [177]').style.display = "none";
    }
}
//for Muranga Wards
function showMuraWard(select) {
    switch (select.value) {
        case 'Gatanga [178]':
            document.getElementById('Gatanga [178]').style.display = "block";
            document.getElementById('Kandara [180]').style.display = "none";
            document.getElementById('Kangema [181]').style.display = "none";
            document.getElementById('Kigumo [182]').style.display = "none";
            document.getElementById('Kiharu [183]').style.display = "none";
            document.getElementById('Mathioya [184]').style.display = "none";
            document.getElementById('Maragwa [185]').style.display = "none";
            break;


        case 'Kandara [180]':
            document.getElementById('Kandara [180]').style.display = "block";
            document.getElementById('Gatanga [178]').style.display = "none";
            document.getElementById('Kangema [181]').style.display = "none";
            document.getElementById('Kigumo [182]').style.display = "none";
            document.getElementById('Kiharu [183]').style.display = "none";
            document.getElementById('Mathioya [184]').style.display = "none";
            document.getElementById('Maragwa [185]').style.display = "none";

            break;

        case 'Kangema [181]':
            document.getElementById('Kangema [181]').style.display = "block";
            document.getElementById('Gatanga [178]').style.display = "none";
            document.getElementById('Kandara [180]').style.display = "none";
            document.getElementById('Kigumo [182]').style.display = "none";
            document.getElementById('Kiharu [183]').style.display = "none";
            document.getElementById('Mathioya [184]').style.display = "none";
            document.getElementById('Maragwa [185]').style.display = "none";
            break;
        case 'Kigumo [182]':
            document.getElementById('Kigumo [182]').style.display = "block";
            document.getElementById('Gatanga [178]').style.display = "none";
            document.getElementById('Kandara [180]').style.display = "none";
            document.getElementById('Kangema [181]').style.display = "none";
            document.getElementById('Kiharu [183]').style.display = "none";
            document.getElementById('Mathioya [184]').style.display = "none";
            document.getElementById('Maragwa [185]').style.display = "none";
            break;

        case 'Kiharu [183]':
            document.getElementById('Kiharu [183]').style.display = "block";
            document.getElementById('Gatanga [178]').style.display = "none";
            document.getElementById('Kandara [180]').style.display = "none";
            document.getElementById('Kangema [181]').style.display = "none";
            document.getElementById('Kigumo [182]').style.display = "none";
            document.getElementById('Mathioya [184]').style.display = "none";
            document.getElementById('Maragwa [185]').style.display = "none";

            break;
        case 'Mathioya [184]':
            document.getElementById('Mathioya [184]').style.display = "block";
            document.getElementById('Gatanga [178]').style.display = "none";
            document.getElementById('Kandara [180]').style.display = "none";
            document.getElementById('Kangema [181]').style.display = "none";
            document.getElementById('Kigumo [182]').style.display = "none";
            document.getElementById('Kiharu [183]').style.display = "none";
            document.getElementById('Maragwa [185]').style.display = "none";
            break;
        case 'Maragwa [185]':
            document.getElementById('Maragwa [185]').style.display = "block";
            document.getElementById('Gatanga [178]').style.display = "none";
            document.getElementById('Kandara [180]').style.display = "none";
            document.getElementById('Kangema [181]').style.display = "none";
            document.getElementById('Kigumo [182]').style.display = "none";
            document.getElementById('Kiharu [183]').style.display = "none";
            document.getElementById('Mathioya [184]').style.display = "none";

            break;


        default:
            document.getElementById('Gatanga [178]').style.display = "none";
            document.getElementById('Kandara [180]').style.display = "none";
            document.getElementById('Kangema [181]').style.display = "none";
            document.getElementById('Kigumo [182]').style.display = "none";
            document.getElementById('Kiharu [183]').style.display = "none";
            document.getElementById('Mathioya [184]').style.display = "none";
            document.getElementById('Maragwa [185]').style.display = "none";
    }
}
// for Nairobi Wards
function showNaiWard(select) {
    switch (select.value) {
        case 'Dagoretti North [186]':
            document.getElementById('Dagoretti North [186]').style.display = "block";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;


        case 'Dagoretti South [187]':
            document.getElementById('Dagoretti South [187]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;

        case 'Embakasi Central [188]':
            document.getElementById('Embakasi Central [188]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;


        case 'Embakasi East [189]':
            document.getElementById('Embakasi East [189]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;

        case 'Embakasi North [190]':
            document.getElementById('Embakasi North [190]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;

        case 'Embakasi South [191]':
            document.getElementById('Embakasi South [191]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;

        case 'Embakasi West [192]':
            document.getElementById('Embakasi West [192]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;
        case 'Kamukunji [193]':
            document.getElementById('Kamukunji [193]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;
        case 'Kasarani [194]':
            document.getElementById('Kasarani [194]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;
        case 'Kibra [195]':
            document.getElementById('Kibra [195]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;
        case 'Langata [196]':
            document.getElementById('Langata [196]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;
        case 'Makadara [197]':
            document.getElementById('Makadara [197]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;
        case 'Mathare [198]':
            document.getElementById('Mathare [198]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;

        case 'Roysambu [199]':
            document.getElementById('Roysambu [199]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;
        case 'Ruaraka [200]':
            document.getElementById('Ruaraka [200]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;
        case 'Starehe [201]]':
            document.getElementById('Starehe [201]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Westlands [202]').style.display = "none";
            break;
        case 'Westlands [202]':
            document.getElementById('Westlands [202]').style.display = "block";
            document.getElementById('Dagoretti North [186]').style.display = "none";
            document.getElementById('Dagoretti South [187]').style.display = "none";
            document.getElementById('Embakasi Central [188]').style.display = "none";
            document.getElementById('Embakasi East [189]').style.display = "none";
            document.getElementById('Embakasi North [190]').style.display = "none";
            document.getElementById('Embakasi South [191]').style.display = "none";
            document.getElementById('Embakasi West [192]').style.display = "none";
            document.getElementById('Kamukunji [193]').style.display = "none";
            document.getElementById('Kasarani [194]').style.display = "none";
            document.getElementById('Kibra [195]').style.display = "none";
            document.getElementById('Langata [196]').style.display = "none";
            document.getElementById('Makadara [197]').style.display = "none";
            document.getElementById('Mathare [198]').style.display = "none";
            document.getElementById('Roysambu [199]').style.display = "none";
            document.getElementById('Ruaraka [200]').style.display = "none";
            document.getElementById('Starehe [201]').style.display = "none";

            break;



        default:
            document.getElementById('Gatanga [178]').style.display = "none";
            document.getElementById('Kahuro [179]').style.display = "none";
            document.getElementById('Kandara [180]').style.display = "none";
            document.getElementById('Kangema [181]').style.display = "none";
            document.getElementById('Kigumo [182]').style.display = "none";
            document.getElementById('Kiharu [183]').style.display = "none";
            document.getElementById('Mathioya [184]').style.display = "none";
            document.getElementById('Muranga South [185]').style.display = "none";
    }
}
//for Nakuru Wards
function showNakWard(select) {
    switch (select.value) {
        case 'Bahati [203]':
            document.getElementById('Bahati [203]').style.display = "block";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
            break;


        case 'Gilgil [204]':
            document.getElementById('Gilgil [204]').style.display = "block";
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
            break;
        case 'Kuresoi North [205]':
            document.getElementById('Kuresoi North [205]').style.display = "block";
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
            break;

        case 'Kuresoi South [206]':
            document.getElementById('Kuresoi South [206]').style.display = "block";
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
            break;
        case 'Molo [207]':
            document.getElementById('Molo [207]').style.display = "block";
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
            break;

        case 'Naivasha [208]':
            document.getElementById('Naivasha [208]').style.display = "block";
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
            break;
        case 'Nakuru Town East [209]':
            document.getElementById('Nakuru Town East [209]').style.display = "block";
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
            break;
        case 'Nakuru Town West [210]':
            document.getElementById('Nakuru Town West [210]').style.display = "block";
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
            break;
        case 'Njoro [211]':
            document.getElementById('Njoro [211]').style.display = "block";
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
            break;
        case 'Rongai [212]':
            document.getElementById('Rongai [212]').style.display = "block";
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
            break;
        case 'Subukia [213]':
            document.getElementById('Subukia [213]').style.display = "block";
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";

            break;

        default:
            document.getElementById('Bahati [203]').style.display = "none";
            document.getElementById('Gilgil [204]').style.display = "none";
            document.getElementById('Kuresoi North [205]').style.display = "none";
            document.getElementById('Kuresoi South [206]').style.display = "none";
            document.getElementById('Molo [207]').style.display = "none";
            document.getElementById('Naivasha [208]').style.display = "none";
            document.getElementById('Nakuru Town East [209]').style.display = "none";
            document.getElementById('Nakuru Town West [210]').style.display = "none";
            document.getElementById('Njoro [211]').style.display = "none";
            document.getElementById('Rongai [212]').style.display = "none";
            document.getElementById('Subukia [213]').style.display = "none";
    }
}
//for Nandi Wards
function showNanWard(select) {
    switch (select.value) {
        case 'Aldai [214]':
            document.getElementById('Aldai [214]').style.display = "block";
            document.getElementById('Chesumei [215]').style.display = "none";
            document.getElementById('Emgwen [216]').style.display = "none";
            document.getElementById('Mosop [217]').style.display = "none";
            document.getElementById('Nandi Hills [218]').style.display = "none";
            document.getElementById('Tinderet [219]').style.display = "none";
            break;


        case 'Chesumei [215]':
            document.getElementById('Chesumei [215]').style.display = "block";
            document.getElementById('Aldai [214]').style.display = "none";
            document.getElementById('Emgwen [216]').style.display = "none";
            document.getElementById('Mosop [217]').style.display = "none";
            document.getElementById('Nandi Hills [218]').style.display = "none";
            document.getElementById('Tinderet [219]').style.display = "none";
            break;
        case 'Emgwen [216]':
            document.getElementById('Emgwen [216]').style.display = "block";
            document.getElementById('Aldai [214]').style.display = "none";
            document.getElementById('Chesumei [215]').style.display = "none";
            document.getElementById('Mosop [217]').style.display = "none";
            document.getElementById('Nandi Hills [218]').style.display = "none";
            document.getElementById('Tinderet [219]').style.display = "none";
            break;

        case 'Mosop [217]':
            document.getElementById('Mosop [217]').style.display = "block";
            document.getElementById('Aldai [214]').style.display = "none";
            document.getElementById('Chesumei [215]').style.display = "none";
            document.getElementById('Emgwen [216]').style.display = "none";
            document.getElementById('Nandi Hills [218]').style.display = "none";
            document.getElementById('Tinderet [219]').style.display = "none";
            break;
        case 'Nandi Hills [218]':
            document.getElementById('Nandi Hills [218]').style.display = "block";
            document.getElementById('Aldai [214]').style.display = "none";
            document.getElementById('Chesumei [215]').style.display = "none";
            document.getElementById('Emgwen [216]').style.display = "none";
            document.getElementById('Mosop [217]').style.display = "none";
            document.getElementById('Tinderet [219]').style.display = "none";
            break;
        case 'Tinderet [219]':
            document.getElementById('Tinderet [219]').style.display = "block";
            document.getElementById('Aldai [214]').style.display = "none";
            document.getElementById('Chesumei [215]').style.display = "none";
            document.getElementById('Emgwen [216]').style.display = "none";
            document.getElementById('Mosop [217]').style.display = "none";
            document.getElementById('Nandi Hills [218]').style.display = "none";

            break;

        default:
            document.getElementById('Aldai [214]').style.display = "none";
            document.getElementById('Chesumei [215]').style.display = "none";
            document.getElementById('Emgwen [216]').style.display = "none";
            document.getElementById('Mosop [217]').style.display = "none";
            document.getElementById('Nandi Hills [218]').style.display = "none";
            document.getElementById('Tinderet [219]').style.display = "none";
    }
}
// For Narok Wards
function showNarWard(select) {
    switch (select.value) {
        case 'Emurua Dikirr [220]':
            document.getElementById('Emurua Dikirr [220]').style.display = "block";
            document.getElementById('Kilgoris [221]').style.display = "none";
            document.getElementById('Narok East [222]').style.display = "none";
            document.getElementById('Narok North [223]').style.display = "none";
            document.getElementById('Narok South [224]').style.display = "none";
            document.getElementById('Narok West [225]').style.display = "none";

            break;


        case 'Kilgoris [221]':
            document.getElementById('Kilgoris [221]').style.display = "block";
            document.getElementById('Emurua Dikirr [220]').style.display = "none";
            document.getElementById('Narok East [222]').style.display = "none";
            document.getElementById('Narok North [223]').style.display = "none";
            document.getElementById('Narok South [224]').style.display = "none";
            document.getElementById('Narok West [225]').style.display = "none";

            break;

        case 'Narok East [222]':
            document.getElementById('Narok East [222]').style.display = "block";
            document.getElementById('Emurua Dikirr [220]').style.display = "none";
            document.getElementById('Kilgoris [221]').style.display = "none";
            document.getElementById('Narok North [223]').style.display = "none";
            document.getElementById('Narok South [224]').style.display = "none";
            document.getElementById('Narok West [225]').style.display = "none";

            break;


        case 'Narok North [223]':
            document.getElementById('Narok North [223]').style.display = "block";
            document.getElementById('Emurua Dikirr [220]').style.display = "none";
            document.getElementById('Kilgoris [221]').style.display = "none";
            document.getElementById('Narok East [222]').style.display = "none";
            document.getElementById('Narok South [224]').style.display = "none";
            document.getElementById('Narok West [225]').style.display = "none";

            break;

        case 'Narok South [224]':
            document.getElementById('Narok South [224]').style.display = "block";
            document.getElementById('Emurua Dikirr [220]').style.display = "none";
            document.getElementById('Kilgoris [221]').style.display = "none";
            document.getElementById('Narok East [222]').style.display = "none";
            document.getElementById('Narok North [223]').style.display = "none";
            document.getElementById('Narok West [225]').style.display = "none";

            break;


        case 'Narok West [225]':
            document.getElementById('Narok West [225]').style.display = "block";
            document.getElementById('Emurua Dikirr [220]').style.display = "none";
            document.getElementById('Kilgoris [221]').style.display = "none";
            document.getElementById('Narok East [222]').style.display = "none";
            document.getElementById('Narok North [223]').style.display = "none";
            document.getElementById('Narok South [224]').style.display = "none";

            break;

        default:
            document.getElementById('Emurua Dikirr [220]').style.display = "none";
            document.getElementById('Kilgoris [221]').style.display = "none";
            document.getElementById('Narok East [222]').style.display = "none";
            document.getElementById('Narok North [223]').style.display = "none";
            document.getElementById('Narok South [224]').style.display = "none";
            document.getElementById('Narok West [225]').style.display = "none";
    }
}
//for Nyamira Wards
function showNyamWard(select) {
    switch (select.value) {
        case 'Borabu [226]':
            document.getElementById('Borabu [226]').style.display = "block";
            document.getElementById('West Mugiringo [227]').style.display = "none";
            document.getElementById('Kitutu Masaba [228]').style.display = "none";
            document.getElementById('North Mugiringo [229]').style.display = "none";

            break;


        case 'West Mugiringo [227]':
            document.getElementById('West Mugiringo [227]').style.display = "block";
            document.getElementById('Borabu [226]').style.display = "none";
            document.getElementById('Kitutu Masaba [228]').style.display = "none";
            document.getElementById('North Mugiringo [229]').style.display = "none";
            break;
        case 'Kitutu Masaba [228]':
            document.getElementById('Kitutu Masaba [228]').style.display = "block";
            document.getElementById('Borabu [226]').style.display = "none";
            document.getElementById('West Mugiringo [227]').style.display = "none";
            document.getElementById('North Mugiringo [229]').style.display = "none";
            break;

        case 'North Mugiringo [229]':
            document.getElementById('North Mugiringo [229]').style.display = "block";
            document.getElementById('Borabu [226]').style.display = "none";
            document.getElementById('West Mugiringo [227]').style.display = "none";
            document.getElementById('Kitutu Masaba [228]').style.display = "none";

            break;


        default:
            document.getElementById('Borabu [226]').style.display = "none";
            document.getElementById('West Mugiringo [227]').style.display = "none";
            document.getElementById('Kitutu Masaba [228]').style.display = "none";
            document.getElementById('North Mugiringo [229]').style.display = "none";
    }
}
// for Nyandarua Wards
function showNyanWard(select) {
    switch (select.value) {
        case 'Kinangop [231]':
            document.getElementById('Kinangop [231]').style.display = "block";
            document.getElementById('Kipipiri [232]').style.display = "none";
            document.getElementById('Ndaragwa [233]').style.display = "none";
            document.getElementById('Ol Jorok [234]').style.display = "none";
            document.getElementById('Ol Kalou [235]').style.display = "none";

            break;


        case 'Kipipiri [232]':
            document.getElementById('Kipipiri [232]').style.display = "block";
            document.getElementById('Kinangop [231]').style.display = "none";
            document.getElementById('Ndaragwa [233]').style.display = "none";
            document.getElementById('Ol Jorok [234]').style.display = "none";
            document.getElementById('Ol Kalou [235]').style.display = "none";

            break;
        case 'Ndaragwa [233]':
            document.getElementById('Ndaragwa [233]').style.display = "block";
            document.getElementById('Kinangop [231]').style.display = "none";
            document.getElementById('Kipipiri [232]').style.display = "none";
            document.getElementById('Ol Jorok [234]').style.display = "none";
            document.getElementById('Ol Kalou [235]').style.display = "none";

            break;

        case 'Ol Jorok [234]':
            document.getElementById('Ol Jorok [234]').style.display = "block";
            document.getElementById('Kinangop [231]').style.display = "none";
            document.getElementById('Kipipiri [232]').style.display = "none";
            document.getElementById('Ndaragwa [233]').style.display = "none";
            document.getElementById('Ol Kalou [235]').style.display = "none";

            break;
        case 'Ol Kalou [235]':
            document.getElementById('Ol Kalou [235]').style.display = "block";
            document.getElementById('Kinangop [231]').style.display = "none";
            document.getElementById('Kipipiri [232]').style.display = "none";
            document.getElementById('Ndaragwa [233]').style.display = "none";
            document.getElementById('Ol Jorok [234]').style.display = "none";
            break;


        default:
            document.getElementById('Kinangop [231]').style.display = "none";
            document.getElementById('Kipipiri [232]').style.display = "none";
            document.getElementById('Ndaragwa [233]').style.display = "none";
            document.getElementById('Ol Jorok [234]').style.display = "none";
            document.getElementById('Ol Kalou [235]').style.display = "none";

    }
}
//for Nyeri wards
function showNyeWard(select) {
    switch (select.value) {
        case 'Tetu [236]':
            document.getElementById('Tetu [236]').style.display = "block";
            document.getElementById('Kieni [237]').style.display = "none";
            document.getElementById('Mathira [238]').style.display = "none";
            document.getElementById('Othaya [239]').style.display = "none";
            document.getElementById('Mukurweini [240]').style.display = "none";
            document.getElementById('Nyeri Town [241]').style.display = "none";
            break;


        case 'Kieni [237]':
            document.getElementById('Kieni [237]').style.display = "block";
            document.getElementById('Tetu [236]').style.display = "none";
            document.getElementById('Mathira [238]').style.display = "none";
            document.getElementById('Othaya [239]').style.display = "none";
            document.getElementById('Mukurweini [240]').style.display = "none";
            document.getElementById('Nyeri Town [241]').style.display = "none";

            break;
        case 'Mathira [238]':
            document.getElementById('Mathira [238]').style.display = "block";
            document.getElementById('Tetu [236]').style.display = "none";
            document.getElementById('Kieni [237]').style.display = "none";
            document.getElementById('Othaya [239]').style.display = "none";
            document.getElementById('Mukurweini [240]').style.display = "none";
            document.getElementById('Nyeri Town [241]').style.display = "none";
            break;

        case 'Othaya [239]':
            document.getElementById('Othaya [239]').style.display = "block";
            document.getElementById('Tetu [236]').style.display = "none";
            document.getElementById('Kieni [237]').style.display = "none";
            document.getElementById('Mathira [238]').style.display = "none";
            document.getElementById('Mukurweini [240]').style.display = "none";
            document.getElementById('Nyeri Town [241]').style.display = "none";
            break;
        case 'Mukurweini [240]':
            document.getElementById('Mukurweini [240]').style.display = "block";
            document.getElementById('Tetu [236]').style.display = "none";
            document.getElementById('Kieni [237]').style.display = "none";
            document.getElementById('Mathira East [238]').style.display = "none";
            document.getElementById('Othaya [239]').style.display = "none";
            document.getElementById('Nyeri Town [241]').style.display = "none";
            break;
        case 'Nyeri Town [241]':
            document.getElementById('Nyeri Town [241]').style.display = "block";
            document.getElementById('Tetu [236]').style.display = "none";
            document.getElementById('Kieni [237]').style.display = "none";
            document.getElementById('Mathira [238]').style.display = "none";
            document.getElementById('Othaya [239]').style.display = "none";
            document.getElementById('Mukurweini [240]').style.display = "none";
            break;

        default:
            document.getElementById('Tetu [236]').style.display = "none";
            document.getElementById('Kieni [237]').style.display = "none";
            document.getElementById('Mathira [238]').style.display = "none";
            document.getElementById('Othaya [239]').style.display = "none";
            document.getElementById('Mukurweini [240]').style.display = "none";
            document.getElementById('Nyeri Town [241]').style.display = "none";

    }
}
//for Samburu wards
function showSamWard(select) {
    switch (select.value) {
        case 'Samburu North [244]':
            document.getElementById('Samburu North [244]').style.display = "block";
            document.getElementById('Samburu East [245]').style.display = "none";
            document.getElementById('Samburu West [246]').style.display = "none";

            break;


        case 'Samburu East [245]':
            document.getElementById('Samburu East [245]').style.display = "block";
            document.getElementById('Samburu North [244]').style.display = "none";
            document.getElementById('Samburu West [246]').style.display = "none";
            break;
        case 'Samburu West [246]':
            document.getElementById('Samburu West [246]').style.display = "block";
            document.getElementById('Samburu North [244]').style.display = "none";
            document.getElementById('Samburu East [245]').style.display = "none";
            break;
        default:
            document.getElementById('Samburu North [244]').style.display = "none";
            document.getElementById('Samburu East [245]').style.display = "none";
            document.getElementById('Samburu West [246]').style.display = "none";

    }
}
// For Siaya Wards
function showSiaWard(select) {
    switch (select.value) {
        case 'Alego Usonga [247]':
            document.getElementById('Alego Usonga [247]').style.display = "block";
            document.getElementById('Bondo [248]').style.display = "none";
            document.getElementById('Gem [249]').style.display = "none";
            document.getElementById('Rarieda [250]').style.display = "none";
            document.getElementById('Ugenya [251]').style.display = "none";
            document.getElementById('Ugunja [252]').style.display = "none";
            break;

        case 'Bondo [248]':
            document.getElementById('Bondo [248]').style.display = "block";
            document.getElementById('Alego Usonga [247]').style.display = "none";
            document.getElementById('Gem [249]').style.display = "none";
            document.getElementById('Rarieda [250]').style.display = "none";
            document.getElementById('Ugenya [251]').style.display = "none";
            document.getElementById('Ugunja [252]').style.display = "none";
            break;
        case 'Gem [249]':
            document.getElementById('Gem [249]').style.display = "block";
            document.getElementById('Alego Usonga [247]').style.display = "none";
            document.getElementById('Bondo [248]').style.display = "none";
            document.getElementById('Rarieda [250]').style.display = "none";
            document.getElementById('Ugenya [251]').style.display = "none";
            document.getElementById('Ugunja [252]').style.display = "none";
            break;
        case 'Rarieda [250]':
            document.getElementById('Rarieda [250]').style.display = "block";
            document.getElementById('Alego Usonga [247]').style.display = "none";
            document.getElementById('Bondo [248]').style.display = "none";
            document.getElementById('Gem [249]').style.display = "none";
            document.getElementById('Ugenya [251]').style.display = "none";
            document.getElementById('Ugunja [252]').style.display = "none";
            break;
        case 'Ugenya [251]':
            document.getElementById('Ugenya [251]').style.display = "block";
            document.getElementById('Alego Usonga [247]').style.display = "none";
            document.getElementById('Bondo [248]').style.display = "none";
            document.getElementById('Gem [249]').style.display = "none";
            document.getElementById('Rarieda [250]').style.display = "none";
            document.getElementById('Ugunja [252]').style.display = "none";
            break;
        case 'Ugunja [252]':
            document.getElementById('Ugunja [252]').style.display = "block";
            document.getElementById('Alego Usonga [247]').style.display = "none";
            document.getElementById('Bondo [248]').style.display = "none";
            document.getElementById('Gem [249]').style.display = "none";
            document.getElementById('Rarieda [250]').style.display = "none";
            document.getElementById('Ugenya [251]').style.display = "none";
            break;
        default:
            document.getElementById('Alego Usonga [247]').style.display = "none";
            document.getElementById('Bondo [248]').style.display = "none";
            document.getElementById('Gem [249]').style.display = "none";
            document.getElementById('Rarieda [250]').style.display = "none";
            document.getElementById('Ugenya [251]').style.display = "none";
            document.getElementById('Ugunja [252]').style.display = "none";
    }
}
//For Taita Taveta
function showTaiWard(select) {
    switch (select.value) {
        case 'Mwatate [253]':
            document.getElementById('Mwatate [253]').style.display = "block";
            document.getElementById('Taveta [254]').style.display = "none";
            document.getElementById('Voi [255]').style.display = "none";
            document.getElementById('Wundanyi [256]').style.display = "none";
            break;

        case 'Taveta [254]':
            document.getElementById('Taveta [254]').style.display = "block";
            document.getElementById('Mwatate [253]').style.display = "none";
            document.getElementById('Voi [255]').style.display = "none";
            document.getElementById('Wundanyi [256]').style.display = "none";
            break;
        case 'Voi [255]':
            document.getElementById('Voi [255]').style.display = "block";
            document.getElementById('Mwatate [253]').style.display = "none";
            document.getElementById('Taveta [254]').style.display = "none";
            document.getElementById('Wundanyi [256]').style.display = "none";
            break;
        case 'Wundanyi [256]':
            document.getElementById('Wundanyi [256]').style.display = "block";
            document.getElementById('Mwatate [253]').style.display = "none";
            document.getElementById('Taveta [254]').style.display = "none";
            document.getElementById('Voi [255]').style.display = "none";
            break;

        default:
            document.getElementById('Mwatate [253]').style.display = "none";
            document.getElementById('Taveta [254]').style.display = "none";
            document.getElementById('Voi [255]').style.display = "none";
            document.getElementById('Wundanyi [256]').style.display = "none";
    }
}
//For Tana River
function showTanWard(select) {
    switch (select.value) {
        case 'Bura[261]':
            document.getElementById('Bura[261]').style.display = "block";
            document.getElementById('Galole[262]').style.display = "none";
            document.getElementById('Garsen[263]').style.display = "none";
            break;

        case 'Galole[262]':
            document.getElementById('Galole[262]').style.display = "block";
            document.getElementById('Bura[261]').style.display = "none";
            document.getElementById('Garsen[263]').style.display = "none";
            break;
        case 'Garsen[263]':
            document.getElementById('Garsen[263]').style.display = "block";
            document.getElementById('Galole[262]').style.display = "none";
            document.getElementById('Bura[261]').style.display = "none";

            break;


        default:

            document.getElementById('Bura[261]').style.display = "none";
            document.getElementById('Galole[262]').style.display = "none";
            document.getElementById('Garsen[263]').style.display = "none";
    }
}
//For Tharaka Nithi Wards
function showThaWard(select) {
    switch (select.value) {
        case 'Maara [267]':
            document.getElementById('Maara [267]').style.display = "block";
            document.getElementById('Chuka/Igambangombe').style.display = "none";
            document.getElementById('Tharaka').style.display = "none";
            break;

        case 'Chuka/Igambangombe':
            document.getElementById('Chuka/Igambangombe').style.display = "block";
            document.getElementById('Maara [267]').style.display = "none";
            document.getElementById('Tharaka').style.display = "none";
            break;
        case 'Tharaka':
            document.getElementById('Tharaka').style.display = "block";
            document.getElementById('Maara [267]').style.display = "none";
            document.getElementById('Chuka/Igambangombe').style.display = "none";
            break;
        default:
            document.getElementById('Maara [267]').style.display = "none";
            document.getElementById('Chuka/Igambangombe').style.display = "none";
            document.getElementById('Tharaka').style.display = "none";
    }
}
//For Transnzoia Wards
function showTraWard(select) {
    switch (select.value) {
        case 'Cherangany [271]':
            document.getElementById('Cherangany [271]').style.display = "block";
            document.getElementById('Endebess [272]').style.display = "none";
            document.getElementById('Kiminini [273]').style.display = "none";
            document.getElementById('Kwanza [274]').style.display = "none";
            document.getElementById('Saboti [275]').style.display = "none";
            break;

        case 'Endebess [272]':
            document.getElementById('Endebess [272]').style.display = "block";
            document.getElementById('Cherangany [271]').style.display = "none";
            document.getElementById('Kiminini [273]').style.display = "none";
            document.getElementById('Kwanza [274]').style.display = "none";
            document.getElementById('Saboti [275]').style.display = "none";
            break;
        case 'Kiminini [273]':
            document.getElementById('Kiminini [273]').style.display = "block";
            document.getElementById('Cherangany [271]').style.display = "none";
            document.getElementById('Endebess [272]').style.display = "none";
            document.getElementById('Kwanza [274]').style.display = "none";
            document.getElementById('Saboti [275]').style.display = "none";
            break;
        case 'Kwanza [274]':
            document.getElementById('Kwanza [274]').style.display = "block";
            document.getElementById('Cherangany [271]').style.display = "none";
            document.getElementById('Endebess [272]').style.display = "none";
            document.getElementById('Kiminini [273]').style.display = "none";
            document.getElementById('Saboti [275]').style.display = "none";
            break;
        case 'Saboti [275]':
            document.getElementById('Saboti [275]').style.display = "block";
            document.getElementById('Cherangany [271]').style.display = "none";
            document.getElementById('Endebess [272]').style.display = "none";
            document.getElementById('Kiminini [273]').style.display = "none";
            document.getElementById('Kwanza [274]').style.display = "none";
            break;

        default:
            document.getElementById('Saboti [275]').style.display = "none";
            document.getElementById('Cherangany [271]').style.display = "none";
            document.getElementById('Endebess [272]').style.display = "none";
            document.getElementById('Kiminini [273]').style.display = "none";
            document.getElementById('Kwanza [274]').style.display = "none";
    }
}
//For Turkana Wards
function showTurWard(select) {
    switch (select.value) {
        case 'Loima [276]':
            document.getElementById('Loima [276]').style.display = "block";
            document.getElementById('Turkana Central [277]').style.display = "none";
            document.getElementById('Turkana East [278]').style.display = "none";
            document.getElementById('Turkana North [279]').style.display = "none";
            document.getElementById('Turkana South [280]').style.display = "none";
            document.getElementById('Turkana West [281]').style.display = "none";
            break;

        case 'Turkana Central [277]':
            document.getElementById('Turkana Central [277]').style.display = "block";
            document.getElementById('Loima [276]').style.display = "none";
            document.getElementById('Turkana East [278]').style.display = "none";
            document.getElementById('Turkana North [279]').style.display = "none";
            document.getElementById('Turkana South [280]').style.display = "none";
            document.getElementById('Turkana West [281]').style.display = "none";
            break;
        case 'Turkana East [278]':
            document.getElementById('Turkana East [278]').style.display = "block";
            document.getElementById('Loima [276]').style.display = "none";
            document.getElementById('Turkana Central [277]').style.display = "none";
            document.getElementById('Turkana North [279]').style.display = "none";
            document.getElementById('Turkana South [280]').style.display = "none";
            document.getElementById('Turkana West [281]').style.display = "none";
            break;
        case 'Turkana North [279]':
            document.getElementById('Turkana North [279]').style.display = "block";
            document.getElementById('Loima [276]').style.display = "none";
            document.getElementById('Turkana Central [277]').style.display = "none";
            document.getElementById('Turkana East [278]').style.display = "none";
            document.getElementById('Turkana South [280]').style.display = "none";
            document.getElementById('Turkana West [281]').style.display = "none";
            break;
        case 'Turkana South [280]':
            document.getElementById('Turkana South [280]').style.display = "block";
            document.getElementById('Loima [276]').style.display = "none";
            document.getElementById('Turkana Central [277]').style.display = "none";
            document.getElementById('Turkana East [278]').style.display = "none";
            document.getElementById('Turkana North [279]').style.display = "none";
            document.getElementById('Turkana West [281]').style.display = "none";
            break;
        case 'Turkana West [281]':
            document.getElementById('Turkana West [281]').style.display = "block";
            document.getElementById('Loima [276]').style.display = "none";
            document.getElementById('Turkana Central [277]').style.display = "none";
            document.getElementById('Turkana East [278]').style.display = "none";
            document.getElementById('Turkana North [279]').style.display = "none";
            document.getElementById('Turkana South [280]').style.display = "none";
            break;

        default:
            document.getElementById('Loima [276]').style.display = "none";
            document.getElementById('Turkana Central [277]').style.display = "none";
            document.getElementById('Turkana East [278]').style.display = "none";
            document.getElementById('Turkana North [279]').style.display = "none";
            document.getElementById('Turkana South [280]').style.display = "none";
            document.getElementById('Turkana West [281]').style.display = "none";
    }
}
// For Uasin Ngishu
function showUaWard(select) {
    switch (select.value) {
        case 'Ainabkoi [282]':
            document.getElementById('Ainabkoi [282]').style.display = "block";
            document.getElementById('Kapseret [283]').style.display = "none";
            document.getElementById('Kesses [284]').style.display = "none";
            document.getElementById('Moiben [285]').style.display = "none";
            document.getElementById('Soy [286]').style.display = "none";
            document.getElementById('Turbo [287]').style.display = "none";
            break;

        case 'Kapseret [283]':
            document.getElementById('Kapseret [283]').style.display = "block";
            document.getElementById('Ainabkoi [282]').style.display = "none";
            document.getElementById('Kesses [284]').style.display = "none";
            document.getElementById('Moiben [285]').style.display = "none";
            document.getElementById('Soy [286]').style.display = "none";
            document.getElementById('Turbo [287]').style.display = "none";
            break;
        case 'Kesses [284]':
            document.getElementById('Kesses [284]').style.display = "block";
            document.getElementById('Ainabkoi [282]').style.display = "none";
            document.getElementById('Kapseret [283]').style.display = "none";
            document.getElementById('Moiben [285]').style.display = "none";
            document.getElementById('Soy [286]').style.display = "none";
            document.getElementById('Turbo [287]').style.display = "none";
            break;
        case 'Moiben [285]':
            document.getElementById('Moiben [285]').style.display = "block";
            document.getElementById('Ainabkoi [282]').style.display = "none";
            document.getElementById('Kapseret [283]').style.display = "none";
            document.getElementById('Kesses [284]').style.display = "none";
            document.getElementById('Soy [286]').style.display = "none";
            document.getElementById('Turbo [287]').style.display = "none";
            break;
        case 'Soy [286]':
            document.getElementById('Soy [286]').style.display = "block";
            document.getElementById('Ainabkoi [282]').style.display = "none";
            document.getElementById('Kapseret [283]').style.display = "none";
            document.getElementById('Kesses [284]').style.display = "none";
            document.getElementById('Moiben [285]').style.display = "none";
            document.getElementById('Turbo [287]').style.display = "none";
            break;
        case 'Turbo [287]':
            document.getElementById('Turbo [287]').style.display = "block";
            document.getElementById('Ainabkoi [282]').style.display = "none";
            document.getElementById('Kapseret [283]').style.display = "none";
            document.getElementById('Kesses [284]').style.display = "none";
            document.getElementById('Moiben [285]').style.display = "none";
            document.getElementById('Soy [286]').style.display = "none";
            break;

        default:
            document.getElementById('Ainabkoi [282]').style.display = "none";
            document.getElementById('Kapseret [283]').style.display = "none";
            document.getElementById('Kesses [284]').style.display = "none";
            document.getElementById('Moiben [285]').style.display = "none";
            document.getElementById('Soy [286]').style.display = "none";
            document.getElementById('Turbo [287]').style.display = "none";
    }
}
// For Vihiga Wards
function showViWard(select) {
    switch (select.value) {
        case 'Emuhaya [288]':
            document.getElementById('Emuhaya [288]').style.display = "block";
            document.getElementById('Hamisi [289]').style.display = "none";
            document.getElementById('Luanda [290]').style.display = "none";
            document.getElementById('Sabatia [291]').style.display = "none";
            document.getElementById('Vihiga [292]').style.display = "none";
            break;

        case 'Hamisi [289]':
            document.getElementById('Hamisi [289]').style.display = "block";
            document.getElementById('Emuhaya [288]').style.display = "none";
            document.getElementById('Luanda [290]').style.display = "none";
            document.getElementById('Sabatia [291]').style.display = "none";
            document.getElementById('Vihiga [292]').style.display = "none";
            break;
        case 'Luanda [290]':
            document.getElementById('Luanda [290]').style.display = "block";
            document.getElementById('Emuhaya [288]').style.display = "none";
            document.getElementById('Hamisi [289]').style.display = "none";
            document.getElementById('Sabatia [291]').style.display = "none";
            document.getElementById('Vihiga [292]').style.display = "none";
            break;
        case 'Sabatia [291]':
            document.getElementById('Sabatia [291]').style.display = "block";
            document.getElementById('Emuhaya [288]').style.display = "none";
            document.getElementById('Hamisi [289]').style.display = "none";
            document.getElementById('Luanda [290]').style.display = "none";
            document.getElementById('Vihiga [292]').style.display = "none";
            break;
        case 'Vihiga [292]':
            document.getElementById('Vihiga [292]').style.display = "block";
            document.getElementById('Emuhaya [288]').style.display = "none";
            document.getElementById('Hamisi [289]').style.display = "none";
            document.getElementById('Luanda [290]').style.display = "none";
            document.getElementById('Sabatia [291]').style.display = "none";
            break;

        default:
            document.getElementById('Emuhaya [288]').style.display = "none";
            document.getElementById('Hamisi [289]').style.display = "none";
            document.getElementById('Luanda [290]').style.display = "none";
            document.getElementById('Sabatia [291]').style.display = "none";
            document.getElementById('Vihiga [292]').style.display = "none";
    }
}
// For West Pokot wards
function showWpWard(select) {
    switch (select.value) {
        case 'Kapenguria [293]':
            document.getElementById('Kapenguria [293]').style.display = "block";
            document.getElementById('Sigor [294]').style.display = "none";
            document.getElementById('Kacheliba [295]').style.display = "none";
            document.getElementById('Pokot South [296]').style.display = "none";
            break;

        case 'Sigor [294]':
            document.getElementById('Sigor [294]').style.display = "block";
            document.getElementById('Kapenguria [293]').style.display = "none";
            document.getElementById('Kacheliba [295]').style.display = "none";
            document.getElementById('Pokot South [296]').style.display = "none";
            break;
        case 'Kacheliba [295]':
            document.getElementById('Kacheliba [295]').style.display = "block";
            document.getElementById('North Pokot [293]').style.display = "none";
            document.getElementById('Sigor [294]').style.display = "none";
            document.getElementById('Pokot South [296]').style.display = "none";
            break;
        case 'Pokot South [296]':
            document.getElementById('Pokot South [296]').style.display = "block";
            document.getElementById('North Pokot [293]').style.display = "none";
            document.getElementById('Sigor [294]').style.display = "none";
            document.getElementById('Kacheliba [295]').style.display = "none";
            break;

        default:
            document.getElementById('Kapenguria [293]').style.display = "none";
            document.getElementById('Sigor [294]').style.display = "none";
            document.getElementById('Kacheliba [295]').style.display = "none";
            document.getElementById('Pokot South [296]').style.display = "none";
    }
}
// For Wajir Wards
function showWajWard(select) {
    switch (select.value) {
        case 'Eldas [297]':
            document.getElementById('Eldas [297]').style.display = "block";
            document.getElementById('Tarbaj [298]').style.display = "none";
            document.getElementById('Wajir East [299]').style.display = "none";
            document.getElementById('Wajir North [300]').style.display = "none";
            document.getElementById('Wajir South [301]').style.display = "none";
            document.getElementById('Wajir West [302]').style.display = "none";
            break;

        case 'Tarbaj [298]':
            document.getElementById('Tarbaj [298]').style.display = "block";
            document.getElementById('Eldas [297]').style.display = "none";
            document.getElementById('Wajir East [299]').style.display = "none";
            document.getElementById('Wajir North [300]').style.display = "none";
            document.getElementById('Wajir South [301]').style.display = "none";
            document.getElementById('Wajir West [302]').style.display = "none";
            break;
        case 'Wajir East [299]':
            document.getElementById('Wajir East [299]').style.display = "block";
            document.getElementById('Eldas [297]').style.display = "none";
            document.getElementById('Tarbaj [298]').style.display = "none";
            document.getElementById('Wajir North [300]').style.display = "none";
            document.getElementById('Wajir South [301]').style.display = "none";
            document.getElementById('Wajir West [302]').style.display = "none";
            break;
        case 'Wajir North [300]':
            document.getElementById('Wajir North [300]').style.display = "block";
            document.getElementById('Eldas [297]').style.display = "none";
            document.getElementById('Tarbaj [298]').style.display = "none";
            document.getElementById('Wajir East [299]').style.display = "none";
            document.getElementById('Wajir South [301]').style.display = "none";
            document.getElementById('Wajir West [302]').style.display = "none";
            break;
        case 'Wajir South [301]':
            document.getElementById('Wajir South [301]').style.display = "block";
            document.getElementById('Eldas [297]').style.display = "none";
            document.getElementById('Tarbaj [298]').style.display = "none";
            document.getElementById('Wajir East [299]').style.display = "none";
            document.getElementById('Wajir North [300]').style.display = "none";
            document.getElementById('Wajir West [302]').style.display = "none";
            break;
        case 'Wajir West [302]':
            document.getElementById('Wajir West [302]').style.display = "block";
            document.getElementById('Eldas [297]').style.display = "none";
            document.getElementById('Tarbaj [298]').style.display = "none";
            document.getElementById('Wajir East [299]').style.display = "none";
            document.getElementById('Wajir North [300]').style.display = "none";
            document.getElementById('Wajir South [301]').style.display = "none";
            break;

        default:
            document.getElementById('Eldas [297]').style.display = "none";
            document.getElementById('Tarbaj [298]').style.display = "none";
            document.getElementById('Wajir East [299]').style.display = "none";
            document.getElementById('Wajir North [300]').style.display = "none";
            document.getElementById('Wajir South [301]').style.display = "none";
            document.getElementById('Wajir West [302]').style.display = "none";
    }
}