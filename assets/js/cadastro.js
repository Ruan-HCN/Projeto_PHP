document.addEventListener('DOMContentLoaded', () => {
    const nomeInput = document.getElementById('nomeCompleto');
    const emailInput = document.getElementById('email');
    const senhaInput = document.getElementById('senha');
    const form = document.querySelector('form');

    // Adiciona spans para feedback
    addFeedbackElements(nomeInput, 50);
    addFeedbackElements(emailInput, 100);
    addFeedbackElements(senhaInput, 20);

    nomeInput.addEventListener('input', () => {
        let valor = nomeInput.value;
        // Remove números, caracteres especiais e múltiplos espaços
        valor = valor.replace(/[^A-Za-zÀ-ÿ\s]/g, '')
            .replace(/\s{2,}/g, ' ')
            .replace(/^\s+/g, '')
            .slice(0, 50);
        nomeInput.value = valor;
        updateCounter(nomeInput);
    });

    emailInput.addEventListener('input', () => {
        let valor = emailInput.value;
        valor = valor.replace(/^\s+/g, '').replace(/\s{2,}/g, ' ').slice(0, 100);
        emailInput.value = valor;
        updateCounter(emailInput);
        mostrarAvisoEmail(valor);
    });

    function mostrarAvisoEmail(email) {
        const feedback = document.getElementById('email-feedback');
        const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

        if (email.length === 0) {
            feedback.innerText = '';
        } else if (!emailValido) {
            feedback.innerText = 'Formato de e-mail inválido.';
        } else {
            feedback.innerText = '';
        }
    }

    senhaInput.addEventListener('input', () => {
        let valor = senhaInput.value;
        valor = valor.replace(/^\s+/g, '').replace(/\s{2,}/g, ' ').slice(0, 20);
        senhaInput.value = valor;
        document.getElementById('senha-counter').innerText = `${senhaInput.value.length}/20 caracteres`;
        mostrarAvisosSenha(valor);
    });

    function mostrarAvisosSenha(senha) {
        const feedback = document.getElementById('senha-feedback');
        const avisos = [];

        if (!/[A-Z]/.test(senha)) {
            avisos.push("• Deve conter pelo menos 1 letra maiúscula.");
        }

        if (!/[!@#\$%\^&\*\(\)\-_+=]/.test(senha)) {
            avisos.push("• Deve conter pelo menos 1 caractere especial (!@#$...).");
        }

        if (!/\d/.test(senha)) {
            avisos.push("• Deve conter pelo menos 1 número.");
        }

        if (/^\s/.test(senha)) {
            avisos.push("• Não pode começar com espaço.");
        }

        if (senha.length > 20) {
            avisos.push("• Máximo de 20 caracteres.");
        }

        if (senha.length === 0) {
            feedback.innerText = '';
        } else if (avisos.length === 0) {
            feedback.innerHTML = `<span class="text-success">Senha válida!</span>`;
        } else {
            feedback.innerHTML = `<span class="text-danger">${avisos.join('<br>')}</span>`;
        }
    }


    form.addEventListener('submit', (e) => {
    const nomeValido = /^[A-Za-zÀ-ÿ]+(?:\s[A-Za-zÀ-ÿ]+)*$/.test(nomeInput.value);
    const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
    const senhaValida = /^(?=.*[A-Z])(?=.*[!@#\$%\^&\*\(\)\-_+=])(?=.*\d).{1,20}$/.test(senhaInput.value);

    if (!nomeValido || !emailValido || !senhaValida) {
        e.preventDefault(); // Só bloqueia se tiver erro
        alert("Por favor, corrija os campos inválidos antes de continuar.");
    }
});


    function addFeedbackElements(input) {
        if (input.id === 'senha') {
            updateCounter(input);
            return;
        }
        const counter = document.createElement('small');
        counter.classList.add('form-text', 'text-muted');
        counter.id = input.id + '-counter';
        input.parentNode.appendChild(counter);
        updateCounter(input);
    }

    function updateCounter(input) {
        const counter = document.getElementById(input.id + '-counter');
        const maxLength = parseInt(input.dataset.maxlength, 10);
        counter.innerText = `${input.value.length}/${maxLength} caracteres`;
    }
});
