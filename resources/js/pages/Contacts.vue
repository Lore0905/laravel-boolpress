<template>
    <div class="container">

        <form>
            
            <!-- name -->
            <div class="form-group">
                <label for="name_contacts">Name</label>
                <input v-model="name_contacts" type="text" class="form-control" id="name_contacts" name="name_contacts" placeholder="Name">
            </div>
            <!-- lastname -->
            <div class="form-group">
                <label for="lastname_contacts">Surname</label>
                <input v-model="lastname_contacts" type="text" class="form-control" id="lastname_contacts" name="lastname_contacts" placeholder="Lastname">
            </div>
            <!-- email -->
            <div class="form-group">
                <label for="email_contact">Email address</label>
                <input v-model="email_contact" type="email" class="form-control" id="email_contact" name="email_contact"  placeholder="Email">
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label for="textarea_contacts">Messaggio</label>
                <textarea v-model="textarea_contacts" class="form-control" id="textarea_contacts" name="textarea_contacts" rows="3" placeholder="Scrivi qui il tuo messaggio"></textarea>
            </div>
            <!-- button -->
            <button type="submit" :disabled="disabled" @click.prevent="sendMessage()" class="btn btn-primary">Inviaci il tuo messaggio</button>

        </form>

    </div>
</template>

<script>
export default {
    name: 'Contacts',
    data: function(){
        return {
            name_contacts: '',
            lastname_contacts: '',
            email_contact: '',
            textarea_contacts: '',
            success: false,
            disabled: false
        };
    },
    methods: {
        sendMessage: function(){
            // quando faccio partire la chiamata ajax il button diventa disabled
            this.disabled = true;

            // faccio una chiamata ajx alla api Api/contact
            axios.post('/api/contact', {
                name_contacts: this.name_contacts,
                lastname_contacts: this.lastname_contacts,
                email_contact: this.email_contact,
                textarea_contacts: this.textarea_contacts
            }).then((response) => {
                // se la success è true, allora ripristina le input, altrimenti success rimane false
                if(response.data.success){
                    this.name_contacts = '';
                    this.lastname_contacts = ''; 
                    this.email_contact = ''; 
                    this.textarea_contacts = ''; 
                }else {
                    this.success = false;
                }
                
                // alla fine della chiamata anche SE NON RIUSCITA il disabled ridiventa false
                this.disabled = false;
            });

        },
        
    }
}
</script>

<style lang="scss" scoped>
label{
    color: white;
    margin-top: 10px;
}
</style>