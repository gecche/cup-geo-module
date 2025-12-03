export default () => {
    return {
        modelName: 'cup_geo_provincia',
        search: {
            modelName: 'cup_geo_provincia',
            type: "v-search",
            fields: ['regione_id'],
            fieldsConfig: {
                'regione_id': {
                    type: 'w-select'
                }
            },
            advancedFields: [],
            actionsConfig: {},
            searchWithButton: true,
        },
        // view : {
        //     modelName : 'cup_geo_provincia',
        //     //fields : ['name','email','password','password_confirmation','banned','mainrole','fotos','attachments'],
        //     actions : [],
        //     fieldsConfig : {
        //         mainrole : {
        //             type : 'w-belongsto',
        //             fields : ['name']
        //         }
        //     }
        // },
        list: {
            modelName: 'cup_geo_provincia',
            "type": "v-list",
            fields: [
                'codice', 'nome_it', 'sigla',
                'regione',
                'attivo'

            ],
            actions: ['action-edit', 'action-delete', 'action-insert', 'action-view',
                'action-export-csv'
            ],
            orderFields: {
                'codice': 'codice',
                'nome_it': 'nome_it',
                'sigla': 'sigla'
            },
            fieldsConfig: {
                'attivo': {
                    type: 'w-swap',
                    modelName: 'cup_geo_provincia'
                },
                'regione': {
                    type: 'w-belongsto',
                    labelFields: [
                        'nome_it',
                    ]
                }
            },
            actionsConfig: {
                'action-export-csv': {
                    text: 'Csv',
                }
            }


        },
        edit: {
            modelName: 'cup_geo_provincia',
            type: 'v-edit',
            actions: ['action-save', 'action-save-back', 'action-back'],
            fields: ['codice', 'nome_it', 'sigla', 'regione_id', 'codice_nuovo'
                //'comuni'
            ],

            fieldsConfig: {
                regione_id: 'w-select',
                //roles : 'w-select',
                comuni: {
                    type: 'w-hasmany',
                    hasmanyType: 'list',
                    layout: {
                        colClass: 'col-span-12',
                    },
                    hasmanyConf: {
                        actions: [
                            'action-delete',
                            'action-insert'
                        ],
                        actionsConfig: {
                            'action-delete': {
                                actionType: 'record',
                            }
                        },
                        fields: ['id', 'codice', 'nome_it', 'codice_catastale', 'cap', 'prefisso_telefonico'],
                        fieldsConfig: {
                            status: {
                                type: 'w-hidden',
                            },
                            id: {
                                type: 'w-hidden',
                            },
                            codice: {
                                type: 'w-input',
                            },
                            nome_it: {
                                type: 'w-input',
                            },
                            codice_catastale: {
                                type: 'w-input',
                            },
                            cap: {
                                type: 'w-input',
                            },
                            prefisso_telefonico: {
                                type: 'w-input',
                            },
                        }
                    }
                },
            },
        },
        // view : {
        //     //actions: ['action-save', 'action-back', 'action-test'],
        //     fields: ['name','email', 'password', 'password_confirmation', 'banned', 'mainrole', 'fotos', 'attachments'],
        //     fieldsConfig :  {
        //         mainrole :  {
        //             type : 'w-belongsto',
        //             fields : ['name']
        //         }
        //     }
        // },
    }
}

