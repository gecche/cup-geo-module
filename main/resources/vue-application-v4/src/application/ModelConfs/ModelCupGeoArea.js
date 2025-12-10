export default () => {
    return {
        modelName: 'cup_geo_area',

        search: {
            modelName: 'cup_geo_area',
            type: "v-search",
            fields: [],
            fieldsConfig: {},
            advancedFields: [],
            actionsConfig: {},
            searchWithButton: true,
        },
        // view : {
        //     modelName : 'cup_geo_area',
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
            modelName: 'cup_geo_area',
            "type": "v-list",
            fields: ['codice', 'nome_it', 'attivo'],
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
                    modelName: 'cup_geo_area'
                }
            },
            actionsConfig: {
                'action-export-csv': {
                    text: 'Csv',
                }
            }
        },
        edit: {
            modelName: 'cup_geo_area',
            type: 'v-edit',
            actions: ['action-save', 'action-save-back', 'action-back'],
            actionsConfig: {},
            fields: ['codice', 'nome_it',
                //'comuni'
            ],
        },

    }
}
