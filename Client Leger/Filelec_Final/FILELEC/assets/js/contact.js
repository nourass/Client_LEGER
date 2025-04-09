
<script>
    document.getElementById("contact-form").addEventListener("submit", function(event) {
        event.preventDefault();

        Swal.fire({
            title: "Message envoyé!",
            text: "Nous avons bien reçu votre message et vous recevrez une réponse sous peu.",
            icon: "success",
            confirmButtonText: "OK"
        }).then(() => {
            this.submit();
        });
    });
</script>
