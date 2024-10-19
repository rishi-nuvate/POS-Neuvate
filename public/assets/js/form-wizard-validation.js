/**
 *  Form Wizard
 */

'use strict';

(function () {
    const select2 = $('.select2'),
        selectPicker = $('.selectpicker');

    // Wizard Validation
    // --------------------------------------------------------------------
    const wizardValidation = document.querySelector('#wizard-validation');
    if (typeof wizardValidation !== undefined && wizardValidation !== null) {
        // Wizard form
        const wizardValidationForm = wizardValidation.querySelector('#wizard-validation-form');
        // Wizard steps
        const wizardValidationFormStep1 = wizardValidationForm.querySelector('#account-details-validation');
        const wizardValidationFormStep2 = wizardValidationForm.querySelector('#personal-info-validation');
        const wizardValidationFormStep3 = wizardValidationForm.querySelector('#commertial-info-validation');
        const wizardValidationFormStep4 = wizardValidationForm.querySelector('#social-links-validation');
        // Wizard next prev button
        const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));
        const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));

        const validationStepper = new Stepper(wizardValidation, {
            linear: true
        });

        // Account details
        const FormValidation1 = FormValidation.formValidation(wizardValidationFormStep1, {
            fields: {
                store_type: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Store Type'
                        }
                    }
                },
                op_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Date'
                        }
                    }
                },
                store_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Store name'
                        }
                    }
                },
                store_code: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Store Code'
                        }
                    }
                },
                store_status: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter store Status'
                        },
                    }
                },

                format: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter format'
                        },
                    }
                },

                firm: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter firm'
                        },
                    }
                },

                gst: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter gst number'
                        },
                    }
                },
                store_phone: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter store Phone number'
                        },
                    }
                },
                store_email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter store email id'
                        },
                    }
                },
                store_city: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter City'
                        },
                    }
                },
                store_state: {
                    validators: {
                        notEmpty: {
                            message: 'Please select State'
                        },
                    }
                },
                store_pincode: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter PinCode'
                        },
                    }
                },
                store_area: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Area'
                        },
                    }
                },
                store_add_line_1: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Address Line 1'
                        },
                    }
                },
                store_add_line_2: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Address Line 2'
                        },
                    }
                }, map_link: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Map link'
                        },
                    }
                }, franchise_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Franchise Name '
                        },
                    }
                }, franchise_phone: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Franchise Phone number'
                        },
                    }
                }, franchise_email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Franchise Email'
                        },
                    }
                }, datanote_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Data Note Name'
                        },
                    }
                }, seller_ware_1: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter SellerWare 1'
                        },
                    }
                }, seller_ware_2: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter SellerWare 2'
                        },
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-6, .col-sm-5'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton()
            },
            init: instance => {
                instance.on('plugins.message.placed', function (e) {
                    //* Move the error message out of the `input-group` element
                    if (e.element.parentElement.classList.contains('input-group')) {
                        e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
                    }
                });
            }
        }).on('core.form.valid', function () {
            // Jump to the next step when all fields in the current step are valid
            validationStepper.next();
        });

        // Personal info
        const FormValidation2 = FormValidation.formValidation(wizardValidationFormStep2, {
            fields: {
                sba_sqft: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Name'
                        },
                    }
                },
                ca_sqft: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Phone number'
                        },
                    }
                },

                store_rating: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Store Rating'
                        },
                    }
                },
                commercial_model: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter commercial model'
                        },
                    }
                },
                margin: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter margin'
                        },
                    }
                },
                add_support: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Additional Support'
                        },
                    }
                },
                security_deposit: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Security Deposit'
                        },
                    }
                },
                capex: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter CAPEX'
                        },
                    }
                },
                rent: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Rent Amount'
                        },
                    }
                },
                bep: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter BEP'
                        },
                    }
                },
                mf: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter MF'
                        },
                    }
                },
                mf_percent: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter MF Percentage'
                        },
                    }
                },
                asm: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter ASM'
                        },
                    }
                },

                manager_email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Email'
                        },
                        emailAddress: {
                            message: 'The value is not a valid email address'
                        }
                    }
                },

            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-6'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton()
            }
        }).on('core.form.valid', function () {
            // Jump to the next step when all fields in the current step are valid
            validationStepper.next();
        });

        // Bootstrap Select (i.e Language select)
        if (selectPicker.length) {
            selectPicker.each(function () {
                var $this = $(this);
                $this.selectpicker().on('change', function () {
                    FormValidation2.revalidateField('formValidationLanguage');
                });
            });
        }

        // select2
        if (select2.length) {
            select2.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this
                    .select2({
                        placeholder: 'Select an country',
                        dropdownParent: $this.parent()
                    })
                    .on('change', function () {
                        // Revalidate the color field when an option is chosen
                        FormValidation2.revalidateField('formValidationCountry');
                    });
            });
        }

        // Social links
        const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
            fields: {
                store_manager: {
                    validators: {
                        notEmpty: {
                            message: 'Enter Payment Type'
                        },
                    }
                },store_manager_phone: {
                    validators: {
                        notEmpty: {
                            message: 'Enter Payment Type'
                        },
                    }
                },store_manager_email: {
                    validators: {
                        notEmpty: {
                            message: 'Enter Payment Type'
                        },
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-6'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton()
            }
        }).on('core.form.valid', function () {
            // You can submit the form
            // wizardValidationForm.submit()
            // or send the form data to server via an Ajax request
            // To make the demo simple, I just placed an alert

            validationStepper.next();

            // alert('Submitted..!!');
        });

        const FormValidation4 = FormValidation.formValidation(wizardValidationFormStep4, {
            fields: {

                loi: {
                    validators: {
                        notEmpty: {
                            message: 'Please select a file for LOI'
                        },
                        file: {
                            extension: 'jpeg,jpg,png,pdf', // Allowed file extensions
                            type: 'image/jpeg,image/png,application/pdf', // Allowed file MIME types
                            maxSize: 2097152, // 2 MB in bytes (2 * 1024 * 1024)
                            message: 'Please choose a valid file (jpeg, jpg, png, or pdf) and the size must not exceed 2MB'
                        }
                    }
                },
                agreement: {
                    validators: {
                        notEmpty: {
                            message: 'Please select a file for Agreement'
                        },
                        file: {
                            extension: 'jpeg,jpg,png,pdf', // Allowed file extensions
                            type: 'image/jpeg,image/png,application/pdf', // Allowed file MIME types
                            maxSize: 2097152, // 2 MB in bytes (2 * 1024 * 1024)
                            message: 'Please choose a valid file (jpeg, jpg, png, or pdf) and the size must not exceed 2MB'
                        }
                    }
                },
                architecture_draw: {
                    validators: {
                        notEmpty: {
                            message: 'Please select a file for Architectural Drawing'
                        },
                        file: {
                            extension: 'jpeg,jpg,png,pdf', // Allowed file extensions
                            type: 'image/jpeg,image/png,application/pdf', // Allowed file MIME types
                            maxSize: 2097152, // 2 MB in bytes (2 * 1024 * 1024)
                            message: 'Please choose a valid file (jpeg, jpg, png, or pdf) and the size must not exceed 2MB'
                        }
                    }
                },
                photo: {
                    validators: {
                        notEmpty: {
                            message: 'Please select a file for photo'
                        },
                        file: {
                            extension: 'jpeg,jpg,png,pdf', // Allowed file extensions
                            type: 'image/jpeg,image/png,application/pdf', // Allowed file MIME types
                            maxSize: 2097152, // 2 MB in bytes (2 * 1024 * 1024)
                            message: 'Please choose a valid file (jpeg, jpg, png, or pdf) and the size must not exceed 2MB'
                        }
                    }
                },
                aadhar_file: {
                    validators: {
                        notEmpty: {
                            message: 'Please select a file for SellerWare 2'
                        },
                        file: {
                            extension: 'jpeg,jpg,png,pdf', // Allowed file extensions
                            type: 'image/jpeg,image/png,application/pdf', // Allowed file MIME types
                            maxSize: 2097152, // 2 MB in bytes (2 * 1024 * 1024)
                            message: 'Please choose a valid file (jpeg, jpg, png, or pdf) and the size must not exceed 2MB'
                        }
                    }
                },
                pan_file: {
                    validators: {
                        notEmpty: {
                            message: 'Please select a file for SellerWare 2'
                        },
                        file: {
                            extension: 'jpeg,jpg,png,pdf', // Allowed file extensions
                            type: 'image/jpeg,image/png,application/pdf', // Allowed file MIME types
                            maxSize: 2097152, // 2 MB in bytes (2 * 1024 * 1024)
                            message: 'Please choose a valid file (jpeg, jpg, png, or pdf) and the size must not exceed 2MB'
                        }
                    }
                },
                gst_file: {
                    validators: {
                        notEmpty: {
                            message: 'Please select a file for SellerWare 2'
                        },
                        file: {
                            extension: 'jpeg,jpg,png,pdf', // Allowed file extensions
                            type: 'image/jpeg,image/png,application/pdf', // Allowed file MIME types
                            maxSize: 2097152, // 2 MB in bytes (2 * 1024 * 1024)
                            message: 'Please choose a valid file (jpeg, jpg, png, or pdf) and the size must not exceed 2MB'
                        }
                    }
                }

            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-6'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton()
            }
        }).on('core.form.valid', function () {
            // You can submit the form
            // wizardValidationForm.submit()
            // or send the form data to server via an Ajax request
            // To make the demo simple, I just placed an alert

            document.getElementById('wizard-validation-form').onsubmit = function (event) {
                // Perform any final validation or actions here.
                // If all is well, the form will be submitted.
                event.preventDefault();
                // if (submitted) return;
                $('#overlay').fadeIn(100);
                fetch('/storeGenerate/store', {
                    method: 'POST', // or 'GET' depending on your needs
                    body: new FormData(wizardValidationForm) // Serialize the form data
                }).then(response => response.json())
                    .then(data => {
                        //console.log(data);
                        if (data.status === 'success') {
                            // alert('Registration Done Successfully..!! now you can login');
                            Swal.fire({
                                icon: 'success',
                                title: 'Vendor Registration!',
                                text: 'Registration Successfully Done.'
                            }).then(() => {
                                $('#overlay').fadeOut(100);
                                window.location.href = '/master';
                            });

                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Vendor Registration!',
                                text: data.message
                            }).then(() => {
                                $('#overlay').fadeOut(100);
                                window.location.href = '/master';
                            });
                        }

                        // Handle the response from the server
                    })
                    .catch(error => {
                        console.log(error);
                        toastr.error('Error:', error.message);
                    });
            };

            // alert('Submitted..!!');
        });

        wizardValidationNext.forEach(item => {
            item.addEventListener('click', event => {
                // When click the Next button, we will validate the current step
                switch (validationStepper._currentIndex) {
                    case 0:
                        FormValidation1.validate();
                        break;

                    case 1:
                        FormValidation2.validate();
                        break;

                    case 2:
                        FormValidation3.validate();
                        break;

                    case 3:
                        FormValidation4.validate();
                        break;

                    default:
                        break;
                }
            });
        });

        wizardValidationPrev.forEach(item => {
            item.addEventListener('click', event => {
                switch (validationStepper._currentIndex) {
                    case 3:
                        validationStepper.previous();
                        break;

                    case 2:
                        validationStepper.previous();
                        break;

                    case 1:
                        validationStepper.previous();
                        break;

                    case 0:

                    default:
                        break;
                }
            });
        });
    }
})();
