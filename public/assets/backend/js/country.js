//for checking  country state and citie

var countryStateInfo = {
    "USA": {
        "California": {
            "Adelanto": ["90001", "90002", "90003", "90004"],
            "Alameda": ["92093", "92101"],
            "Albany":["92093", "92101"],
            "Alhambra": ["90001", "90002", "90003", "90004"],
            "Anaheim": ["92093", "92101"],
            "Anderson":["92093", "92101"],
            "Antioch": ["90001", "90002", "90003", "90004"],
            "Apple Valley": ["92093", "92101"],
            "Amador":["92093", "92101"],
        },
        "Texas": {
            "Houston": ["90001", "90002", "90003", "90004"],
            "San Antonio": ["92093", "92101"],
            "Dallas":["92093", "92101"],
            "Austin": ["90001", "90002", "90003", "90004"],
            "kusjim": ["92093", "92101"]
        },
        "Alabama": {
            "Birmingham": ["90001", "90002", "90003", "90004"],
            "Montgomery": ["92093", "92101"],
            "Huntsville":["92093", "92101"],
            "Akron": ["90001", "90002", "90003", "90004"],
            "Addison": ["92093", "92101"]
        },
        "Alaska": {
            "Adak": ["90001", "90002", "90003", "90004"],
            "Akhiok": ["92093", "92101"],
            "Akiak":["92093", "92101"],
            "Akutan": ["90001", "90002", "90003", "90004"],
            "Aleknagik": ["92093", "92101"],
            "Angoon": ["90001", "90002", "90003", "90004"],
            "Aniak": ["92093", "92101"],
            "Anvik":["92093", "92101"],
            "Atka": ["90001", "90002", "90003", "90004"],
            "Buckland": ["92093", "92101"]
        },
        " 	Arizona": {
            "Apache Junction": ["90001", "90002", "90003", "90004"],
            "Avondale": ["92093", "92101"],
            "Benson":["92093", "92101"],
            "Buckeye": ["90001", "90002", "90003", "90004"],
            "Camp Verde": ["92093", "92101"],
            "Carefree": ["90001", "90002", "90003", "90004"],
            "Casa Grande": ["92093", "92101"],
            "Cave Creek":["92093", "92101"],
            "Chandler": ["90001", "90002", "90003", "90004"],
            "Chino Valley": ["92093", "92101"]
        },
        "Arkansas": {
            "Little Rock": ["90001", "90002", "90003", "90004"],
            "Fort Smith": ["92093", "92101"],
            "Fayetteville":["92093", "92101"],
            "Springdale": ["90001", "90002", "90003", "90004"],
            "Jonesboro": ["92093", "92101"],
            "North Little Rock": ["90001", "90002", "90003", "90004"],
            "Conway": ["92093", "92101"],
            "Rogers":["92093", "92101"],
            "Bentonville": ["90001", "90002", "90003", "90004"],
            "Benton": ["92093", "92101"]
        },
        "Colorado": {
            "Aguilar": ["90001", "90002", "90003", "90004"],
            "Akron": ["92093", "92101"],
            "Alamosa":["92093", "92101"],
            "Alma": ["90001", "90002", "90003", "90004"],
            "Antonito": ["92093", "92101"],
            "Arriba": ["90001", "90002", "90003", "90004"],
            "Arvada": ["92093", "92101"],
            "Ault":["92093", "92101"],
            "Aurora": ["90001", "90002", "90003", "90004"],
            "Basalt": ["92093", "92101"]
        },
        "Georgia": {
            "Savannah": ["90001", "90002", "90003", "90004"],
            "Columbus ": ["92093", "92101"],
            "Sandy Springs":["92093", "92101"],
            "Macon": ["90001", "90002", "90003", "90004"],
            "Roswell ": ["92093", "92101"],
            "Albany": ["90001", "90002", "90003", "90004"],
            "Johns Creek": ["92093", "92101"],
            "Warner Robins ":["92093", "92101"],
            "Alpharetta ": ["90001", "90002", "90003", "90004"],
            "Valdosta ": ["92093", "92101"]
        },
        "Hawaii": {
            "Urban Honolulu": ["90001", "90002", "90003", "90004"],
            "East Honolulu ": ["92093", "92101"],
            "Pearl City":["92093", "92101"],
            "Hilo": ["90001", "90002", "90003", "90004"],
            "Waipahu ": ["92093", "92101"],
            "Kailua CDP": ["90001", "90002", "90003", "90004"],
            "Kaneohe": ["92093", "92101"],
            "Kahului ":["92093", "92101"],
            "Mililani Town": ["90001", "90002", "90003", "90004"],
            "Kihei": ["92093", "92101"]
        },
        "Idaho": {
            "Boise ": ["90001", "90002", "90003", "90004"],
            "Meridian": ["92093", "92101"],
            "Nampa":["92093", "92101"],
            "Idaho Falls ": ["90001", "90002", "90003", "90004"],
            "Pocatello ": ["92093", "92101"],
            "Caldwell ": ["90001", "90002", "90003", "90004"],
            "Coeur ": ["92093", "92101"],
            "Twin Falls ":["92093", "92101"],
            "Eagle": ["90001", "90002", "90003", "90004"],
            "Malad city": ["92093", "92101"]
        },
        " Indiana": {
            "Los Angeles": ["90001", "90002", "90003", "90004"],
            "San Diego": ["92093", "92101"]
        }

    },
    "India": {
        "Assam": {
            "Udalguri": ["81005"],
            "Karimganj": ["81030", "81030"],
            "Cachar": ["81005"],
            "Kamrup": ["81030", "81030"],
            "Golaghat": ["81005"],
            "Goalpara": ["81030", "81030"],
            "Chirang": ["81005"],
            "Dibrugarh": ["81030", "81030"]
        },
        "Gujarat": {
            "Ahmedabad": ["81005"],
            "Vadodara": ["81030", "81030"],
            "Anand": ["81005"],
            "Chhota ": ["81030", "81030"],
            "Dahod": ["81005"],
            "Goalpara": ["81030", "81030"],
            "Patan": ["81005"],
            "Morbi": ["81030", "81030"]
        },

        "Andhra Pradesh": {
            "Vijayawada": ["81005"],
            "Guntur": ["81030", "81030"],
            "Nellore": ["81005"],
            "Kurnool ": ["81030", "81030"],
            "Rajamundry": ["81005"],
            "Kadapa": ["81030", "81030"],
            "Eluru": ["81005"],
            "Vizianagaram": ["81030", "81030"]
        },
        "Arunachal Pradesh": {
            "Anjaw": ["81005"],
            "Changlang": ["81030", "81030"],
            "Upper Dibang ":["81030", "81030"],
            "East Siang": ["81006"],
            "Kra Daadi": ["81036", "81036"],
            "Lohit": ["81006"]

        },
        "Bihar": {
            "Patna": ["81005"],
            "Gaya": ["81030", "81030"],
            "Bhagalpur": ["81005"],
            "Muzaffarpur ": ["81030", "81030"],
            "Purnia": ["81005"],
            "Darbhanga": ["81030", "81030"],
            "Bihar Sharif": ["81005"],
            "Arrah": ["81030", "81030"]
        },
        "Chhattisgarh": {
            "Bastar": ["81005"],
            "Bijapur": ["81030", "81030"],
            "Bilaspur": ["81005"],
            "Dhamtari ": ["81030", "81030"],
            "Jashpur": ["81005"],
            "Korba": ["81030", "81030"],
            "Koriya": ["81005"],
            "Raigarh": ["81030", "81030"]
        },
        "Goa": {
            "Bicholim": ["81005"],
            "Canacona": ["81030", "81030"],
            "Cuncolim": ["81005"],
            "Mapusa ": ["81030", "81030"],
            "Margao": ["81005"],
            "Pernem": ["81030", "81030"],
            "Ponda": ["81005"],
            "Quepem": ["81030", "81030"]
        },
        "Haryana": {
            "Faridabad": ["81005"],
            "Gurugram": ["81030", "81030"],
            "Ambala": ["81005"],
            "Rohtak ": ["81030", "81030"],
            "Hisar": ["81005"],
            "Karnal": ["81030", "81030"],
            "Sonipat": ["81005"],
            "Panchkula": ["81030", "81030"]
        }


    },
    "Pakistan": {
        "punjab": {

            "Ahmadpur East":["390011", "390020"],
            " Ahmed Nager Chatha":["390011", "390020"],
            " Ali Khan Abad":["390011", "390020"],
            "Alipur":["390011", "390020"],
            "Arifwala":["390011", "390020"],
            "Attock":["390011", "390020"],
            "Bhera":["390011", "390020"],
            "Bhalwal":["390011", "390020"],
            "Bahawalnagar":["390011", "390020"],
            "Bahawalpur":["390011", "390020"],
            "Bhakkar":["390011", "390020"],
            "Burewala":["390011", "390020"],
            "Chillianwala":["390011", "390020"],
            "Chakwal":["390011", "390020"],
            "Chichawatni":["390011", "390020"],
            "Chiniot":["390011", "390020"],
            "Chishtian":["390011", "390020"],
            "Daska":["390011", "390020"],
            "Darya Khan":["390011", "390020"],
            "Dera Ghazi Khan":["390011", "390020"],
            "Dhaular":["390011", "390020"],
            "Dina":["390011", "390020"],
            "Dinga":["390011", "390020"],
            "Dipalpur":["390011", "390020"],
            "Faisalabad":["390011", "390020"],
            "Fateh Jang":["390011", "390020"],
            "Ghakhar Mandi":["390011", "390020"],
            "Gojra":["390011", "390020"],
            "Gujranwala":["390011", "390020"],
            "Gujrat":["390011", "390020"],
            "Gujar Khan":["390011", "390020"],
            "Hafizabad":["390011", "390020"],
            "Haroonabad":["390011", "390020"],
            "Hasilpur":["390011", "390020"],
            "Haveli Lakha":["390011", "390020"],
            "Jalalpur Jattan":["390011", "390020"],
            "Jampur":["390011", "390020"],
            "Jhang":["390011", "390020"],
            "Jhelum":["390011", "390020"],
            "Kalabagh":["390011", "390020"],
            "Karor Lal Esan":["390011", "390020"],
            "Kasur":["390011", "390020"],
            "Kamalia":["390011", "390020"],
            "Kāmoke":["390011", "390020"],
            "Khanewal":["390011", "390020"],
            "Khanpur":["390011", "390020"],
            "Kharian":["390011", "390020"],
            "Khushab":["390011", "390020"],
            "Kot Adu":["390011", "390020"],
            "Jauharabad":["390011", "390020"],
            "Lahore":["390011", "390020"],
            "Lalamusa":["390011", "390020"],
            "Layyah":["390011", "390020"]
        },
        "sindh": {
            "Badin":["390033", "390044"],
            "Bhirkan":["390033", "390044"],
            "Bhiria City":["390033", "390044"],
            "Bhiria Road":["390033", "390044"],
            "Rajo Khanani":["390033", "390044"],
            "Chak":["390033", "390044"],
            "Dadu":["390033", "390044"],
            "Digri":["390033", "390044"],
            "Diplo":["390033", "390044"],
            "Dokri":["390033", "390044"],
            "Gambat":["390033", "390044"],
            "Garhi Yasin":["390033", "390044"],
            "Ghotki":["390033", "390044"],
            "Hyderabad":["390033", "390044"],
            "Islamkot":["390033", "390044"],
            "Jacobabad":["390033", "390044"],
            "Jamshoro":["390033", "390044"],
            "Jungshahi":["390033", "390044"],
            "Kandhkot":["390033", "390044"],
            "Kandiaro":["390033", "390044"],
            "Karachi":["390033", "390044"],
            "Kashmore":["390033", "390044"],
            "Keti Bandar":["390033", "390044"],
            "Khadro":["390033", "390044"],
            "Khairpur":["390033", "390044"],
            "Khipro":["390033", "390044"],
            "Kotri":["390033", "390044"],
            "Larkana":["390033", "390044"],
            "Madeji":["390033", "390044"],
            "Matiari":["390033", "390044"],
            "Mehar":["390033", "390044"],
            "Mirpur Khas":["390033", "390044"],
            "Mithani":["390033", "390044"],
            "Mithi":["390033", "390044"],
            "Mehrabpur":["390033", "390044"],
            "Moro":["390033", "390044"],
            "Nagarparkar":["390033", "390044"],
            "Naudero":["390033", "390044"],
            "Naushahro Feroze":["390033", "390044"],
            "Nawabshah":["390033", "390044"],
            "Qambar":["390033", "390044"],
            "Sijawal Junejo":["390033", "390044"],
            "Qasimabad":["390033", "390044"],
            "Ranipur":["390033", "390044"],
            "Ratodero":["390033", "390044"],
            "Rohri":["390033", "390044"],
            "Sakrand":["390033", "390044"],
            "Sanghar":["390033", "390044"],
            "Shahbandar":["390033", "390044"],
            "Shahdadkot":["390033", "390044"],
            "Shahdadpur":["390033", "390044"],
            "Shahpur Chakar":["390033", "390044"]
        },

        "KPK": {

            " Abbottabad":["380033", "410044"],
            "Adezai":["380033", "410044"],
            "Alpuri":["380033", "410044"],
            "Akora Khattak":["380033", "410044"],
            "Ayubia":["380033", "410044"],
            "Banda Daud Shah":["380033", "410044"],
            "Bannu":["380033", "410044"],
            "Batkhela":["380033", "410044"],
            "Battagram":["380033", "410044"],
            "Birote":["380033", "410044"],
            "Chakdara":["380033", "410044"],
            "Charsadda":["380033", "410044"],
            "Chitral":["380033", "410044"],
            "Daggar":["380033", "410044"],
            "Dargai":["380033", "410044"],
            "Darya Khan":["380033", "410044"],
            "Dera Ismail Khan":["380033", "410044"],
            "Doaba":["380033", "410044"],
            "Dir":["380033", "410044"],
            "Drosh":["380033", "410044"],
            "Hangu":["380033", "410044"],
            "Haripur":["380033", "410044"],
            "Karak":["380033", "410044"],
            "Kohat":["380033", "410044"],
            "Kulachi":["380033", "410044"],
            "Lakki Marwat":["380033", "410044"],
            "Latamber":["380033", "410044"],
            "Madyan":["380033", "410044"],
            "Mansehra":["380033", "410044"],
            "Mardan":["380033", "410044"],
            "Mastuj":["380033", "410044"],
            "Mingora":["380033", "410044"],
            "Nowshera":["380033", "410044"],
            "Paharpur":["380033", "410044"],
            "Pabbi":["380033", "410044"]
        },
        "Balochistan": {
            "Quetta": ["390098"],
            "Khuzdar": ["395006"],
            "Turbat": ["390098"],
            "Chaman": ["390098"],
            "Hub": ["390098"],
            "Sibi": ["390098"],
            "Gwadar": ["395006"],
            "Dera Murad Jamali": ["390098"],
            "Dera Allah Yar": ["390098"],
            "Usta Mohammad": ["390098"],
            "Pasni": ["390098"],
            "Loralai": ["395006"],
            "Kalat": ["390098"],
            "Nushki": ["390098"],
            "Mastung": ["390098"]

        },


    },
    "Bangladash": {
        "Barisal": {
            "Dispur": ["781005"],
            "Guwahati": ["781030", "781030"]
        },
        "Chittagong": {
            "Vadodara": ["390011", "390020"],
            "Surat": ["395006", "395002"]
        },

        "Dhaka": {
            "Dispur": ["781005"],
            "Guwahati": ["781030", "781030"]
        },
        "Khulna": {
            "Vadodara": ["390011", "390020"],
            "Surat": ["395006", "395002"]
        },
        "Mymensin": {
            "Dispur": ["781005"],
            "Guwahati": ["781030", "781030"]
        },
        "Rajshahi": {
            "Vadodara": ["390011", "390020"],
            "Surat": ["395006", "395002"]
        },


    },
    "Sodia Arabia": {
        "Tabuk": {
            "Abu Salama": ["781005"],
            "Al Bad": ["781090"],
            "Al Ghara'is": ["781005"],
            "Al Khuraybah": ["781090"],
            "Al Mafraq": ["781005"],
            "Al Maqnāh": ["781090"],
            "Al Muwaylih": ["781005"],
            "Al Wajh": ["781090"]
        },
        "Bahah": {
            "Al Bahah": ["781005"],
            "Hadhra": ["781090"],
            "Hajrah": ["781005"],
            "Эль-Баха": ["781090"],
            "Al Mafraq": ["781005"],
            "Al Maqnāh": ["781090"],
            "Ḩişn al Quhayb": ["781005"],

        },

        "Jawf": {
            "Sakakah": ["781005"],
            "tabarjal": ["781030", "781030"],
            "Qurayyat": ["781005"],
            "Dumat al jandal": ["781030", "781030"]
        },
        "Madinah": {
            "Mecca": ["390011", "390020"],
            "Al Mazah": ["395006", "395002"],
            "Al Abwa": ["390011", "390020"],
            "Badr": ["395006", "395002"],
            "Mazahmiyya": ["390011", "390020"],
            "Baljurashi": ["395006", "395002"]
        },
        "Jizan": {
            "Rayyan": ["390011", "390020"],
            "Samba": ["395006", "395002"],
            "Sabya": ["390011", "390020"],
            "Samta": ["395006", "395002"]
        },


    },
    "Afghanistan": {
        "Kandahar": {
            "jandahar": ["781005"],
            "Herat": ["781030", "781030"],
            "Delaram": ["781005"],
            "Arghaistan": ["781030", "781030"],
        },
        "Herat ": {
            "Balka": ["781005"],
            "Kandhar": ["781030", "781030"],
            "Bimiya": ["781005"],
            "Bagram": ["781030", "781030"],
        },

        "Kunduz.": {
            "Khan Abad": ["781005"],
            "Archi": ["781030", "781030"],
            "Dasht e archi": ["781005"],
            "hatayar": ["781030", "781030"],
        },
        "Jalalabad": {
            "Khanjala": ["781005"],
            "Adinpur": ["781030", "781030"],
            "Taloqan": ["781005"],
            "Kabul": ["781030", "781030"],
        },
        "Lashkar Gah": {
            "Balka": ["781005"],
            "Kandhar": ["781030", "781030"],
            "Bimiya": ["781005"],
            "Bagram": ["781030", "781030"],
        },


    },
    "Canada": {
        "British Columbia": {
            "Abbotsford": ["121212"],
            "Armstrong": ["121030"],
            "Burnaby": ["121212"],
            "Campbell River": ["121030"],
            "Castlegar": ["121212"],
            "Chilliwack": ["121030"],
            "Colwood": ["121030"],
            "Coquitlam": ["121212"],
            "Courtenay": ["121030"],
        },
        "Alberta ": {
            "Calgary ": ["390015"],
            "Edmonton  ": ["390015"],
            "Red Deer ": ["390015"],
            "Lethbridge  ": ["390015"],
            "St. Albert  ": ["390015"]

        },

        "Saskatchewan .": {
            "Melfort ": ["390013"],
            "Moose Jaw  ": ["390013"],
            "Prince Albert ": ["390013"],
            "Swift Current  ": ["390013"],
            "Humboldt  ": ["390014"]
        },
        "Manitoba ": {
            "Brandon ": ["390013"],
            "Selkirk  ": ["390013"],
            "Steinbach ": ["390013"],
            "Thompson  ": ["390013"],
            "Winkler  ": ["390014"]
        },
        "Ontario ": {
            "Toronto ": ["390013"],
            "Ottawa  ": ["390013"],
            " Brampton ": ["390013"],
            " Hamilton  ": ["390013"],
            "London  ": ["390014"]
        },
        "Quebec": {
            "Montreal ": ["390013"],
            "Laval   ": ["390013"],
            " Gatineau ": ["390013"],
            " Saguenay  ": ["390013"]

        },
        "New Brunswick ": {
            "Bathurst ": ["390013"],
            "Dieppe   ": ["390013"],
            " Edmundston ": ["390013"],
            " Miramichi  ": ["390013"]
        },
        "Nova Scotia ": {
            "Amherst ": ["390013"],
            "Antigonish  ": ["390013"],
            " Digby ": ["390013"],
            " Lockeport  ": ["390013"],
            "Middleton  ": ["390014"]
        }

    }
}


window.onload = function () {

    //Get html elements
    var countySel = document.getElementById("countySel");
    var stateSel = document.getElementById("stateSel");
    var citySel = document.getElementById("citySel");
    var zipSel = document.getElementById("zipSel");

    //Load countries
    for (var country in countryStateInfo) {
        countySel.options[countySel.options.length] = new Option(country, country);
    }

    //County Changed
    countySel.onchange = function () {

        stateSel.length = 1; // remove all options bar first
        citySel.length = 1; // remove all options bar first
        zipSel.length = 1; // remove all options bar first

        if (this.selectedIndex < 1)
            return; // done

        for (var state in countryStateInfo[this.value]) {
            stateSel.options[stateSel.options.length] = new Option(state, state);
        }
    };

    //State Changed
    stateSel.onchange = function () {

        citySel.length = 1; // remove all options bar first
        zipSel.length = 1; // remove all options bar first

        if (this.selectedIndex < 1)
            return; // done

        for (var city in countryStateInfo[countySel.value][this.value]) {
            citySel.options[citySel.options.length] = new Option(city, city);
        }
    };

    //City Changed
    citySel.onchange = function () {
        zipSel.length = 1; // remove all options bar first

        if (this.selectedIndex < 1)
            return; // done

        var zips = countryStateInfo[countySel.value][stateSel.value][this.value];
        for (var i = 0; i < zips.length; i++) {
            zipSel.options[zipSel.options.length] = new Option(zips[i], zips[i]);
        }
    };


    /*
    =================================================================
            Tahira Work for edit user
    =================================================================
    */

    //Get html elements
    var CountySel = document.getElementById("CountySel");
    var StateSel = document.getElementById("StateSel");
    var CitySel = document.getElementById("CitySel");
    var ZipSel = document.getElementById("ZipSel");

    //Load countries
    for (var country in countryStateInfo) {
        CountySel.options[CountySel.options.length] = new Option(country, country);
    }

    //County Changed
    CountySel.onchange = function () {

        StateSel.length = 1; // remove all options bar first
        CitySel.length = 1; // remove all options bar first
        ZipSel.length = 1; // remove all options bar first

        if (this.selectedIndex < 1)
            return; // done

        for (var state in countryStateInfo[this.value]) {
            StateSel.options[StateSel.options.length] = new Option(state, state);
        }
    };

    //State Changed
    StateSel.onchange = function () {

        CitySel.length = 1; // remove all options bar first
        ZipSel.length = 1; // remove all options bar first

        if (this.selectedIndex < 1)
            return; // done

        for (var city in countryStateInfo[CountySel.value][this.value]) {
            CitySel.options[CitySel.options.length] = new Option(city, city);
        }
    };

    //City Changed
    CitySel.onchange = function () {
        ZipSel.length = 1; // remove all options bar first

        if (this.selectedIndex < 1)
            return; // done

        var zips = countryStateInfo[CountySel.value][StateSel.value][this.value];
        for (var i = 0; i < zips.length; i++) {
            ZipSel.options[ZipSel.options.length] = new Option(zips[i], zips[i]);
        }
    };



    /*++++++++++++++++++++++++++ Maria Work+++++++++++++++++++++++++++++++++++++++++*/
    //Get html elements
    var countryName = document.getElementById("company-country");
    var provinceName = document.getElementById("company-province");
    var cityName = document.getElementById("company-city");
    var zipSel = document.getElementById("zipSel");

    //Load countries
    for (var country in countryStateInfo) {
        countryName.options[countryName.options.length] = new Option(country, country);
    }

    //County Changed
    countryName.onchange = function () {

        provinceName.length = 1; // remove all options bar first
        cityName.length = 1; // remove all options bar first
        zipSel.length = 1; // remove all options bar first

        if (this.selectedIndex < 1)
            return; // done

        for (var state in countryStateInfo[this.value]) {
            provinceName.options[provinceName.options.length] = new Option(state, state);
        }
    }

    //State Changed
    provinceName.onchange = function () {

        cityName.length = 1; // remove all options bar first
        zipSel.length = 1; // remove all options bar first

        if (this.selectedIndex < 1)
            return; // done

        for (var city in countryStateInfo[countryName.value][this.value]) {
            cityName.options[cityName.options.length] = new Option(city, city);
        }
    }

    //City Changed
    cityName.onchange = function () {
        zipSel.length = 1; // remove all options bar first

        if (this.selectedIndex < 1)
            return; // done

        var zips = countryStateInfo[countryName.value][provinceName.value][this.value];
        for (var i = 0; i < zips.length; i++) {
            zipSel.options[zipSel.options.length] = new Option(zips[i], zips[i]);
        }
    }
};
