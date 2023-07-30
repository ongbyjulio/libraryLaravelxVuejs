var controller = new Vue({
    el: "#controller",
    data: {
        // untuk menyimpan sebuah variable
        datas: [],
        data: {},
        actionUrl, // = actionUrl : actionUrl
        apiUrl,
        editStatus: false,
    },

    mounted: function () {
        // function yang akan dijalankan saat membuka halaman
        this.datatable();
    },
    methods: {
        // untuk menyimpan beberapa function

        datatable() {
            const _this = this;
            _this.table = $("#dataTable")
                .DataTable({
                    ajax: {
                        url: _this.apiUrl,
                        type: "GET",
                    },
                    columns, //diedit sebelum columns: columns
                })
                .on("xhr", function () {
                    _this.datas = _this.table.ajax.json().data;
                });
        },

        addData() {
            this.data = {}; //mengosongkan data
            // this.actionUrl = '{{ url('authors') }}'; untuk mengosongkan data
            this.editStatus = false;
            $("#defaultModal").modal();
        },
        editData(event, row) {
            this.data = this.datas[row];
            this.editStatus = true;
            $("#defaultModal").modal();
        },
        deleteData(event, id) {
            if (confirm("Are you Sure?")) {
                $(event.target).parents("tr").remove();
                axios
                    .post(this.actionUrl + "/" + id, {
                        _method: "DELETE",
                    })
                    .then((response) => {
                        alert("Data Has Been removed");
                    });
            }
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
                    _this.table.ajax.reload();
                });
        },
    },
});
