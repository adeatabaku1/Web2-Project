const API_KEY = '5ef30053969d8fb1103ba051631aebae';
//Ky është çelësi i API-së që përdoret për të identifikuar kërkesat te shërbimi i OpenWeatherMap.

const getWeatherByCityName = () => {
    //Merr vlerat nga inputi me id e caktume.
    const city = document.getElementById('cityInput').value;
    const country_code = document.getElementById('countryInput').value;
    const api_url = `http://api.openweathermap.org/data/2.5/weather?q=${city},${country_code}&appid=${API_KEY}&units=metric`;
   //Krijon një objekt të ri XMLHttpRequest për të bërë kërkesën HTTP.
    const xhr = new XMLHttpRequest();

    //Hap një kërkesë GET te URL-ja e krijuar
    xhr.open('GET', api_url, true);
    
    //sa here qe ndrron gjendja ekzekutohet funksioni
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            //(readyState 4 do të thotë që kërkesa është përfunduar)
            if (xhr.status === 200) {
            //Kontrollon nëse kërkesa ka qenë e suksesshme (status 200 do të thotë OK).
                const data = JSON.parse(xhr.responseText);
                const description = data.weather[0].description;
                const temperature = data.main.temp;
                const humidity = data.main.humidity;
                //Gjen elementin HTML me klasën e cakutar
                const cityElement = document.querySelector('.city');
                const countryElement = document.querySelector('.country');
                const descriptionElement = document.querySelector('.description');
                const temperatureElement = document.querySelector('.temperature');
                const humidityElement = document.querySelector('.humidity');

                cityElement.textContent = city;
                countryElement.textContent = country_code.toUpperCase();
                descriptionElement.textContent = description;
                temperatureElement.textContent = `Temperature: ${temperature}°C`;
                //Vendos temperaturën në elementin temperature duke përfshirë njësiën °C.
                humidityElement.textContent = `Humidity: ${humidity}%`;
            } else {
                console.error('Error retrieving weather data');
            }
        }
    };

    xhr.send();
};
