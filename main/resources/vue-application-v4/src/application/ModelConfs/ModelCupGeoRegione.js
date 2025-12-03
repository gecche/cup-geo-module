export default () => {
    return {
        modelName: 'cup_geo_regione',
        search: {
            modelName: 'cup_geo_regione',
            type: "v-search",
            fields: [
                'area_id'
            ],
            fieldsConfig: {
                'area_id': {
                    type: 'w-select'
                }
            },
            advancedFields: [],
            actionsConfig: {},
            searchWithButton: true,
        },
        // view : {
        //     modelName : 'cup_geo_regione',
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
            modelName: 'cup_geo_regione',
            "type": "v-list",
            fields: [
                'codice', 'nome_it',
                'area',
                'attivo'

            ],
            actions: ['action-edit', 'action-delete', 'action-insert',
                'action-export-csv'
            ],
            orderFields: {
                'codice': 'codice',
                'nome_it': 'nome_it'
            },
            fieldsConfig: {
                'attivo': {
                    type: 'w-swap',
                    modelName: 'cup_geo_regione'
                },
                'area': {
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
            modelName: 'cup_geo_regione',
            type: 'v-edit',
            actions: ['action-save', 'action-save-back', 'action-back'],
            fields: ['codice', 'nome_it', 'area_id'
                //'comuni'
            ],
            fieldsConfig: {
                'area_id': {
                    type: 'w-select'
                }
            }
        },

    }
}