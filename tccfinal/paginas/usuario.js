// script.js
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('settingsForm');
    const saveButton = document.getElementById('saveButton');
    const avatarUpload = document.getElementById('avatarUpload');
    const avatar = document.getElementById('avatar');
    const tabButtons = document.querySelectorAll('.sidebar button[data-tab]');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        saveButton.classList.add('loading');
        saveButton.disabled = true;

        const formData = new FormData(form);

        fetch('settings.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message, 'success');
            } else {
                showNotification('Erro ao atualizar o perfil. Tente novamente.', 'error');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            showNotification('Ocorreu um erro. Tente novamente mais tarde.', 'error');
        })
        .finally(() => {
            saveButton.classList.remove('loading');
            saveButton.disabled = false;
        });
    });

    avatarUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                avatar.src = e.target.result;
                avatar.style.animation = 'pulse 0.5s';
                setTimeout(() => {
                    avatar.style.animation = '';
                }, 500);
            }
            reader.readAsDataURL(file);
        }
    });

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            tabButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            // Aqui você pode adicionar lógica para mudar o conteúdo com base na aba selecionada
        });
    });

    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.textContent = message;
        notification.className = `notification ${type}`;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.opacity = '1';
            notification.style.transform = 'translateY(0)';
        }, 10);

        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Adicione este estilo ao seu arquivo CSS
    const style = document.createElement('style');
    style.textContent = `
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.3s ease;
            z-index: 1000;
        }
        .notification.success {
            background-color: #4CAF50;
        }
        .notification.error {
            background-color: #f44336;
        }
    `;
    document.head.appendChild(style);
});