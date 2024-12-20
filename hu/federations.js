// Szövetségek listája
var federations = [
    { code: "AFG", name: "Afghanistan" },
    { code: "ALB", name: "Albania" },
    { code: "ALG", name: "Algeria" },
    { code: "AND", name: "Andorra" },
    { code: "ANG", name: "Angola" },
    { code: "ANT", name: "Antigua and Barbuda" },
    { code: "ARG", name: "Argentina" },
    { code: "ARM", name: "Armenia" },
    { code: "ARU", name: "Aruba" },
    { code: "AUS", name: "Australia" },
    { code: "AUT", name: "Austria" },
    { code: "AZE", name: "Azerbaijan" },
    { code: "BAH", name: "Bahamas" },
    { code: "BAN", name: "Bangladesh" },
    { code: "BAR", name: "Barbados" },
    { code: "BLR", name: "Belarus" },
    { code: "BEL", name: "Belgium" },
    { code: "BEN", name: "Benin" },
    { code: "BER", name: "Bermuda" },
    { code: "BHU", name: "Bhutan" },
    { code: "BOL", name: "Bolivia" },
    { code: "BIH", name: "Bosnia & Herzegovina" },
    { code: "BOT", name: "Botswana" },
    { code: "BRA", name: "Brazil" },
    { code: "BRU", name: "Brunei Darussalam" },
    { code: "BUL", name: "Bulgaria" },
    { code: "BUR", name: "Burkina Faso" },
    { code: "BDI", name: "Burundi" },
    { code: "CAM", name: "Cambodia" },
    { code: "CMR", name: "Cameroon" },
    { code: "CAN", name: "Canada" },
    { code: "CAY", name: "Cayman Islands" },
    { code: "CAF", name: "Central African Republic" },
    { code: "CHA", name: "Chad" },
    { code: "CHI", name: "Chile" },
    { code: "CHN", name: "China" },
    { code: "COL", name: "Colombia" },
    { code: "COM", name: "Comoros" },
    { code: "CGO", name: "Congo" },
    { code: "COK", name: "Cook Islands" },
    { code: "CRC", name: "Costa Rica" },
    { code: "CIV", name: "Côte d'Ivoire" },
    { code: "CRO", name: "Croatia" },
    { code: "CUB", name: "Cuba" },
    { code: "CYP", name: "Cyprus" },
    { code: "CZE", name: "Czech Republic" },
    { code: "DEN", name: "Denmark" },
    { code: "DJI", name: "Djibouti" },
    { code: "DMA", name: "Dominica" },
    { code: "DOM", name: "Dominican Republic" },
    { code: "ECU", name: "Ecuador" },
    { code: "EGY", name: "Egypt" },
	{ code: "ENG", name: "England" },
    { code: "ESA", name: "El Salvador" },
    { code: "GEQ", name: "Equatorial Guinea" },
    { code: "ERI", name: "Eritrea" },
    { code: "EST", name: "Estonia" },
    { code: "ETH", name: "Ethiopia" },
    { code: "FAR", name: "Faroe Islands" },
    { code: "FIJ", name: "Fiji" },
    { code: "FIN", name: "Finland" },
    { code: "FRA", name: "France" },
    { code: "GAB", name: "Gabon" },
    { code: "GAM", name: "Gambia" },
    { code: "GEO", name: "Georgia" },
    { code: "GER", name: "Germany" },
    { code: "GHA", name: "Ghana" },
    { code: "GRE", name: "Greece" },
    { code: "GRN", name: "Grenada" },
    { code: "GUM", name: "Guam" },
    { code: "GUA", name: "Guatemala" },
    { code: "GUI", name: "Guinea" },
    { code: "GCI", name: "Guernsey" },
    { code: "GUY", name: "Guyana" },
    { code: "HAI", name: "Haiti" },
    { code: "HON", name: "Honduras" },
	{ code: "HKG", name: "Hong Kong" },
    { code: "HUN", name: "Hungary" },
    { code: "ISL", name: "Iceland" },
    { code: "IND", name: "India" },
    { code: "INA", name: "Indonesia" },
    { code: "IRI", name: "Iran" },
    { code: "IRQ", name: "Iraq" },
    { code: "IRL", name: "Ireland" },
    { code: "IMN", name: "Isle of Man" },
    { code: "ISR", name: "Israel" },
    { code: "ITA", name: "Italy" },
    { code: "JAM", name: "Jamaica" },
    { code: "JPN", name: "Japan" },
	{ code: "JCI", name: "Jersey" },
    { code: "JOR", name: "Jordan" },
    { code: "KAZ", name: "Kazakhstan" },
    { code: "KEN", name: "Kenya" },
    { code: "KIR", name: "Kiribati" },
    { code: "KOR", name: "Korea" },
    { code: "KUW", name: "Kuwait" },
    { code: "KGZ", name: "Kyrgyzstan" },
    { code: "LAO", name: "Laos" },
    { code: "LAT", name: "Latvia" },
    { code: "LIB", name: "Lebanon" },
    { code: "LES", name: "Lesotho" },
    { code: "LBR", name: "Liberia" },
    { code: "LBA", name: "Libya" },
    { code: "LIE", name: "Liechtenstein" },
    { code: "LTU", name: "Lithuania" },
    { code: "LUX", name: "Luxembourg" },
	{ code: "MAC", name: "Macau" },
    { code: "MAD", name: "Madagascar" },
    { code: "MAW", name: "Malawi" },
    { code: "MAS", name: "Malaysia" },
    { code: "MDV", name: "Maldives" },
    { code: "MLI", name: "Mali" },
    { code: "MLT", name: "Malta" },
    { code: "MHL", name: "Marshall Islands" },
    { code: "MRI", name: "Mauritius" },
    { code: "MEX", name: "Mexico" },
    { code: "MDA", name: "Moldova" },
    { code: "MON", name: "Monaco" },
    { code: "MGL", name: "Mongolia" },
    { code: "MNE", name: "Montenegro" },
    { code: "MAR", name: "Morocco" },
    { code: "MOZ", name: "Mozambique" },
    { code: "MYA", name: "Myanmar" },
    { code: "NAM", name: "Namibia" },
    { code: "NEP", name: "Nepal" },
    { code: "NED", name: "Netherlands" },
    { code: "NZL", name: "New Zealand" },
    { code: "NCA", name: "Nicaragua" },
    { code: "NIG", name: "Niger" },
    { code: "NGR", name: "Nigeria" },
	{ code: "NIR", name: "Northern Ireland" },
    { code: "MKD", name: "North Macedonia" },
    { code: "NOR", name: "Norway" },
    { code: "OMA", name: "Oman" },
    { code: "PAK", name: "Pakistan" },
    { code: "PLE", name: "Palestine" },
    { code: "PAN", name: "Panama" },
	{ code: "PNG", name: "Papua New Guinea" },
    { code: "PAR", name: "Paraguay" },
    { code: "PER", name: "Peru" },
    { code: "PHI", name: "Philippines" },
    { code: "POL", name: "Poland" },
    { code: "POR", name: "Portugal" },
    { code: "QAT", name: "Qatar" },
    { code: "ROU", name: "Romania" },
    { code: "RUS", name: "Russia" },
    { code: "RWA", name: "Rwanda" },
    { code: "SKN", name: "Saint Kitts and Nevis" },
    { code: "LCA", name: "Saint Lucia" },
    { code: "VIN", name: "Saint Vincent and the Grenadines" },
    { code: "SAM", name: "Samoa" },
    { code: "SMR", name: "San Marino" },
    { code: "STP", name: "Sao Tome and Principe" },
    { code: "KSA", name: "Saudi Arabia" },
	{ code: "SCO", name: "Scotland" },
    { code: "SEN", name: "Senegal" },
    { code: "SRB", name: "Serbia" },
    { code: "SEY", name: "Seychelles" },
    { code: "SLE", name: "Sierra Leone" },
    { code: "SIN", name: "Singapore" },
    { code: "SVK", name: "Slovakia" },
    { code: "SLO", name: "Slovenia" },
    { code: "SOL", name: "Solomon Islands" },
    { code: "SOM", name: "Somalia" },
    { code: "RSA", name: "South Africa" },
    { code: "KOR", name: "South Korea" },
    { code: "SSD", name: "South Sudan" },
    { code: "ESP", name: "Spain" },
    { code: "SRI", name: "Sri Lanka" },
    { code: "SUD", name: "Sudan" },
    { code: "SUR", name: "Suriname" },
    { code: "SWZ", name: "Eswatini" },
    { code: "SWE", name: "Sweden" },
    { code: "SUI", name: "Switzerland" },
    { code: "SYR", name: "Syria" },
	{ code: "TPE", name: "Taiwan" }, 
    { code: "TJK", name: "Tajikistan" },
    { code: "TAN", name: "Tanzania" },
    { code: "THA", name: "Thailand" },
    { code: "TOG", name: "Togo" },
    { code: "TGA", name: "Tonga" },
    { code: "TTO", name: "Trinidad and Tobago" },
    { code: "TUN", name: "Tunisia" },
    { code: "TUR", name: "Turkey" },
    { code: "TKM", name: "Turkmenistan" },
    { code: "UGA", name: "Uganda" },
    { code: "UKR", name: "Ukraine" },
    { code: "UAE", name: "United Arab Emirates" },
    { code: "USA", name: "United States" },
    { code: "URU", name: "Uruguay" },
    { code: "UZB", name: "Uzbekistan" },
    { code: "VAN", name: "Vanuatu" },
    { code: "VEN", name: "Venezuela" },
    { code: "VIE", name: "Vietnam" },
    { code: "ISV", name: "Virgin Islands" },
	{ code: "WAL", name: "Wales" },
    { code: "YEM", name: "Yemen" },
    { code: "ZAM", name: "Zambia" },
    { code: "ZIM", name: "Zimbabwe" }
];

// Szövetségek legördülő listáinak dinamikus generálása
function populateFederationSelectors() {
    var federationOptions = '<option value="" disabled selected>Válasszon szövetséget</option>'; // Alapértelmezett opció
    federationOptions += federations.map(function(federation) {
        return '<option value="' + federation.code + '">' + federation.code + ' (' + federation.name + ')</option>';
    }).join('');

    for (var i = 1; i <= 9; i++) {
        $('#federation' + i).html(federationOptions);
    }
}