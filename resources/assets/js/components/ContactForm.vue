<template>
    <div class="form-contact">
                <p v-if="sent">A sua mensagem foi recebido. Aguarde nossa resposta.</p>
                <form v-else @submit.prevent="submit">
                    <div class="input-container container-flex space-between">
                        <input v-model="form.name" placeholder="Seu nome" class="input-name" autocomplete='name' required>
                        <input v-model="form.email" type="email" placeholder="Email" class="input-email" required>
                    </div>
                    <div class="input-container">
                        <input v-model="form.subject" placeholder="Assunto" class="input-subject" required>
                    </div>
                    <div class="input-container">
                        <textarea v-model="form.message"  cols="30" rows="10" placeholder="Sua Messagem" required></textarea>
                    </div>
                    <div class="send-message">
                        <button class="text-uppercase c-green">Enviar messagem</button>
                    </div>
                </form>
            </div>
</template>
<script>
    export default {
        data(){
            return {
                sent: false,
                form: {
                    name: '',
                    email: '',
                    subject: '',
                    message: '',
                }
            }
        },
        methods: {
            submit(){
                axios.post('/api/messages', this.form)
                    .then(res => {
                        this.sent = true;
                    })
            }
        }
    }
</script>
