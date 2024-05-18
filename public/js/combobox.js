document
    .getElementById("selectRestaurant")
    .addEventListener("change", function () {
        var restaurantName = this.value;
        if (restaurantName) {
            // Kirim permintaan AJAX untuk mendapatkan data menu makanan untuk restoran yang dipilih
            fetch(`/get-menu/${restaurantName}`)
                .then((response) => response.json())
                .then((data) => {
                    // Tampilkan data menu makanan dalam tabel
                    displayMenu(data);
                })
                .catch((error) => console.error("Error:", error));
        }
    });

// Fungsi untuk menampilkan data menu makanan dalam tabel
function displayMenu(data) {
    var table = `
            <table class="w-full text-sm text-center rtl:text-right text-black dark:text-gray-400 mt-2">
                <thead class="text-xs text-black uppercase bg-[#F4B04F] dark:bg-gray-700 dark:text-gray-400 h-10">
                    <tr>
                        <th>Nama makanan</th>
                        <th>Gambar makanan</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
        `;

    data.forEach((item) => {
        table += `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">${item.name}</td>
                    <td class="px-6 py-4 whitespace-nowrap"> <img src="{{ asset('images/') }}/${item.image_path}" alt="Restaurant Image"
                            class="w-16 h-16 object-cover rounded-full"></td>
                    <td class="px-6 py-4 whitespace-nowrap">Rp ${item.price}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${item.description}</td>
                </tr>
            `;
    });

    table += `</tbody></table>`;
    document.getElementById("restaurantMenu").innerHTML = table;
}
