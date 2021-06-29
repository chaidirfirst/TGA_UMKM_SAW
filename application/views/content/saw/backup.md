<script>
    send_email();

    function send_email() {
        var data_pengguna = JSON.parse('<?= json_encode($rank_top) ?>');
        var total_data = data_pengguna.length;
        let per_data = 1;
        var status_bar = $('#progrees_email');
        var persen_bar = $('#role_send_email_bar');
        var email_send = $('#email_send')
        data_pengguna.forEach((val, index) => {
            var msg = 'apa';
            let persen = Math.ceil((per_data / total_data) * 100);
            var result;
            $.post("<?= base_url('api/send_email') ?>", {
                nik: val.nik,
                pesan: "aku sedang"
            }, (data) => {
                var json = JSON.parse(data);
                result = json.status;
            });
            
            setTimeout(function(){
                status_bar.html(per_data + '/' + total_data);
            //    persen ini diesekusi setelah ajax post
            var str_html = '<tr><td>' + per_data + '</td><td>' + val.nama_lengkap + '</td>' +
                '<td>' + val.no_telepon + '</td>' + '<td>' + val.email + '</td>' + '<td>' + result + '</td>' + '</tr>';
                email_send.append(str_html);
             
            persen_bar.html(persen + '%');
            persen_bar.css("width", persen + '%');
            persen_bar.add
            per_data++;
            }, 1000);

        });
    }
</script>