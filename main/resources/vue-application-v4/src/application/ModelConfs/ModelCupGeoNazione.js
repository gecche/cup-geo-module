export default () => {
    return {
        modelName: 'cup_geo_nazione',
        search: {
            type: "v-search",
            modelName: 'cup_geo_nazione',
            fields: [
                'continente_id',
                'area_id',
            ],
            fieldsConfig: {
                'continente_id': {
                    type: 'w-select',
                },
                'area_id': {
                    type: 'w-select',
                }
            },
            advancedFields: [],
            actionsConfig: {},
            searchWithButton: true,
        },
        // view : {
        //     modelName : 'cup_geo_nazione',
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
            modelName: 'cup_geo_nazione',
            "type": "v-list",
            fields: [
                // 'id',
                'codice_istat',
                'nome_it',
                'nome_en',
                'codice_catastale',
                'codice_iso_2',
                'continente',
                'area',
                'flagicon',
                'attivo'
            ],
            fieldsConfig: {
                'continente': {
                    type: 'w-belongsto',
                    labelFields: [
                        'nome_it',
                    ],
                },
                'area': {
                    type: 'w-belongsto',
                    labelFields: [
                        'nome_it',
                    ],
                },
                flagicon: {
                    type: 'w-custom',
                    ready() {
                        var that = this;
                        var iso = (that.modelData.codice_iso_2).toLowerCase();
                        if (iso === 'uk') iso = 'gb';
                        that.value = '<span class="flag flag-' +
                            iso +
                            '"></span>';
                    }
                },
                attivo: {
                    type: 'w-swap',
                    modelName: 'cup_geo_nazione'
                }
            },
            actions: [
                'action-edit', 'action-delete', 'action-insert',
                'action-export-csv'
            ],
            orderFields: {
                'codice': 'codice',
                'nome_it': 'nome_it'
            },
            actionsConfig: {
                'action-export-csv': {
                    text: 'Csv',
                }
            }
        },
        edit: {
            modelName: 'cup_geo_nazione',
            type: 'v-edit',
            actions: ['action-save', 'action-save-back', 'action-back'],
            actionsConfig: {},
            fields: [
                'codice_istat',
                'nome_it',
                'nome_en',
                'continente_id',
                'area_id',
                'codice_catastale',
                'codice_iso_2',
                'codice_iso_3',
                'parent_id',
                'attivo'
            ],
            fieldsConfig: {
                parent_id: {
                    type: 'w-select',
                },
                area_id: {
                    type: 'w-select',
                },
                continente_id: {
                    type: 'w-select',
                }

            }
        },
    }
}
