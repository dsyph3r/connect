

$(function() {

    /**
     * Contact Model
     */
    window.Contact = Backbone.Model.extend({
    });

    /**
    * Contact Collection
    */
    window.ContactCollection = Backbone.Collection.extend({

       url: '/app_dev.php/contacts',

       // Reference to this collection's model.
       model: Contact
       
    });

    // Contact Collection
    window.Contacts = new ContactCollection;

    /**
     * Contact View
     */
    window.ContactView = Backbone.View.extend({

       // Cache the template
       template: _.template($('#contact-template').html()),

       // Setup Events
       events: {
           "click a.contact-delete"     : "delete"
       },

       // Bind the listeners for the Model events
       initialize: function() {
           this.model.bind('change', this.render, this);
           this.model.bind('destroy', this.remove, this);
       },

       // Render the content of a Contact object
       render: function() {
           $(this.el).html(this.template(this.model.toJSON()));
           this.setValues();
           return this;
       },

       setValues: function() {
           this.$('.contact-name').text(this.model.get('name'));
           this.$('.contact-email').text(this.model.get('email'));
           this.$('.contact-location').text(this.model.get('location'));
           this.$('.contact-website').text(this.model.get('website'));
           this.$('.contact-tel').text(this.model.get('tel'));
           this.$('.contact-mobile').text(this.model.get('mobile'));
           this.$('.contact-additional').text(this.model.get('additional'));
           this.$('.contact-image').attr('src', this.model.get('gravatar_url'));
       },

       // Remove model from DOM
       remove: function() {
           $(this.el).remove();
       },

       // Remove item and destroy model
       delete: function() {
           this.model.destroy();
       }

    });


    /**
     * Connect Application
     */
    window.AppView = Backbone.View.extend({

        // Bind to element
        el: $("#connectapp"),

        // Setup events
        events: {
            "click #nav-my-contacts":       "showContacts",
            "click #nav-create-contact":    "showCreateContact",
            "click .create-new":            "createOnSubmit",
            "click .cancel-new":            "cancelNew"
        },

        initialize: function() {
            Contacts.bind('add',   this.addContact, this);
            Contacts.bind('reset', this.addAllContacts, this);
            Contacts.bind('all',   this.render, this);

            // Get the contacts
            Contacts.fetch();
        },

        // Add a Contact
        addContact: function(Contact) {
            var view = new ContactView({model: Contact});
            this.$("#contact-list").append(view.render().el);
        },

        // Add all Contacts in Contact Collection
        addAllContacts: function() {
            Contacts.each(this.addContact);
        },

        createOnSubmit: function(e) {
            e.preventDefault();

            this.clearErrors();

            var details = {}
            // Do some basic validation, all fields are required
            var errors = false;
            $('form .fields :input').each(function(i, el) {
                if ('' === $(this).val()) {
                    $(this).parent().parent().addClass('error');
                    errors = true;
                }
                else {
                    var name = $(this).attr('name');
                    details[name] = $(this).val();
                }
            });
            if (errors) return;

            Contacts.create(details);

            // Reset fields
            $('form .fields :input').val('');

            this.showContacts();
        },

        cancelNew: function() {
            this.clearErrors();
            this.showContacts();
        },

        clearErrors: function() {
            $('.clearfix.error').removeClass('error');
        },

        showContacts: function() {
            $('#create-contact').css('display', 'none');
            $('#contact-list').css('display', 'block');
        },

        showCreateContact: function() {
            $('#contact-list').css('display', 'none');
            $('#create-contact').css('display', 'block');
        }
    });

    // Create the Application
    window.App = new AppView;

});
