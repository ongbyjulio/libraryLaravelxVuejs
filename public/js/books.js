var app = new Vue({
    el: "#controller",
    data: {
        books: [],
        search: "",
        book: {},
        actionUrl, // = actionUrl : actionUrl
        apiUrl,
        editStatus: false,
    },
    mounted: function () {
        this.get_books();
    },
    methods: {
        get_books() {
            const _this = this;
            $.ajax({
                url: apiUrl,
                method: "GET",
                success: function (data) {
                    _this.books = JSON.parse(data);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        },
        addData() {
            this.book = {};
            this.editStatus = false;
            $("#defaultModal").modal();
        },
        editData(book) {
            this.book = book;
            this.editStatus = true;
            $("#defaultModal").modal();
        },

        submitForm(event, id) {
            event.preventDefault();
            const _this = this;
            var actionUrl = !this.editStatus
                ? this.actionUrl
                : this.actionUrl + "/" + id;
            axios
                .post(actionUrl, new FormData($(event.target)[0]))
                .then((response) => {
                    $("#defaultModal").modal("hide");
                    _this.get_books(); //reload halaman
                });
        },

        deleteData(event, id) {
            const _this = this;
            if (confirm("Are you Sure?")) {
                const targetDiv = event.target.closest(".col-xl-3"); // Menggunakan closest() untuk mencari elemen terdekat dengan kelas ".col-xl-3"
                if (targetDiv) {
                    targetDiv.remove(); // Menghapus elemen terdekat yang ditemukan
                }
                axios
                    .post(this.actionUrl + "/" + id, {
                        _method: "DELETE",
                    })
                    .then((response) => {
                        alert("Data Has Been removed");

                        $("#defaultModal").modal("hide");
                        _this.get_books();
                    });
            }
        },

        numberWithSpaces(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        truncateText(text, maxLength) {
            if (text.length <= maxLength) {
                return text;
            } else {
                return text.substring(0, maxLength) + "...";
            }
        },
    },
    computed: {
        filteredList() {
            return this.books.filter((book) => {
                return book.title
                    .toLowerCase()
                    .includes(this.search.toLowerCase());
            });
        },
    },
});
