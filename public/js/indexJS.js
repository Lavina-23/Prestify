const competitions = {
            uiux: [
                { 
                    name: "Lomba Desain UI/UX Nasional 2024", 
                    flyer: "../public/img/uiux1.jpg", 
                    caption: "Buat desain UI/UX terbaik untuk aplikasi masa depan! Lomba ini bertujuan untuk mencari bakat-bakat desainer yang kreatif dan inovatif. Peserta diharapkan membuat prototipe yang berfokus pada pengalaman pengguna yang optimal dan desain antarmuka yang menarik."
                },
                { 
                    name: "Kompetisi Inovasi UX untuk Aplikasi Mobile", 
                    flyer: "../public/img/uiux2.jpg", 
                    caption: "Tunjukkan inovasi UX dalam aplikasi mobile! Kompetisi ini menantang peserta untuk memecahkan masalah user experience dengan solusi inovatif yang dapat meningkatkan efisiensi dan kenyamanan pengguna aplikasi mobile."
                }
            ],
            smartcity: [
                { 
                    name: "Lomba Konsep Smart City Terbaik", 
                    flyer: "../public/img/smartcity1.jpg", 
                    caption: "Ide terbaik untuk kota pintar masa depan! Kompetisi ini mendorong peserta untuk menciptakan konsep teknologi yang dapat meningkatkan kualitas hidup di perkotaan dengan solusi berbasis IoT dan teknologi digital."
                },
                { 
                    name: "Hackathon Smart City 2024", 
                    flyer: "../public/img/smartcity2.png",
                    caption: "Bangun solusi inovatif untuk kota pintar! Hackathon ini mengundang tim-tim pengembang untuk membuat prototipe yang dapat menyelesaikan berbagai tantangan perkotaan dengan pendekatan teknologi."
                }
            ]
        };

        function showCompetitions(category) {
            const listElement = document.getElementById("competition-items");
            const detailsElement = document.getElementById("competition-details");
            listElement.innerHTML = "";
            detailsElement.innerHTML = "";

            const selectedCompetitions = competitions[category];

            selectedCompetitions.forEach((competition) => {
                const listItem = document.createElement("li");
                listItem.textContent = competition.name;
                listItem.onclick = () => showDetails(competition);
                listElement.appendChild(listItem);
            });
        }

        function showDetails(competition) {
            const detailsElement = document.getElementById("competition-details");
            detailsElement.innerHTML = `
                <img src="${competition.flyer}" alt="${competition.name}">
                <div class="competition-caption">
                    <h3>${competition.name}</h3>
                    <p>${competition.caption}</p>
                </div>
            `;
        }