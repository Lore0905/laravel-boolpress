<template>
    <div class="container">

        <form>
            
            <!-- name -->
            <div class="form-group">
                <label for="name_contacts">Name</label>
                <input type="text" class="form-control" id="name_contacts" name="name_contacts" placeholder="Name">
            </div>
            <!-- lastname -->
            <div class="form-group">
                <label for="lastname_contacts">Surname</label>
                <input type="text" class="form-control" id="lastname_contacts" name="lastname_contacts" placeholder="Lastname">
            </div>
            <!-- email -->
            <div class="form-group">
                <label for="email_contact">Email address</label>
                <input type="email" class="form-control" id="email_contact" name="email_contact"  placeholder="Email">
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label for="textarea_contacts">Messaggio</label>
                <textarea class="form-control" id="textarea_contacts" name="textarea_contacts" rows="3" placeholder="Scrivi qui il tuo messaggio"></textarea>
            </div>
            <!-- button -->
            <button type="submit" class="btn btn-primary">Inviaci il tuo messaggio</button>

        </form>

    </div>
</template>

<script>
export default {
    name: 'Contacts',
    components: {
        
    }
}
</script>

<style lang="scss" scoped>
label{
    color: white;
    margin-top: 10px;
}
</style>