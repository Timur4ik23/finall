document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();

    const form = event.target;
    const email = form.email.value;
    const audio = form.fileToUpload;
    const audioName = audio.files[0].name;

    const dataToServer = JSON.stringify({
        email: email,
        audio: audioName
    });

    fetch('http://localhost:2323/db.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: dataToServer
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'ok') {
            // console.log(data);
            form.submit();
        } else {

            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});
