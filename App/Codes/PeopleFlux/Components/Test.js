import React, { Component } from 'react';

import { StyleSheet, View, TextInput, Text, ActivityIndicator, TouchableOpacity } from 'react-native';

class Test extends React.Component
{


    show_Events = () =>{

            fetch(
              '../Helpers/DataBaseTestPHP.php',
            {
                method: 'POST',
                headers:
                {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({})

            }).then((response) => response.json()).then((responseJsonFromServer) =>
            {
                console.log(responseJsonFromServer);

            }).catch((error) =>
            {
                console.error(error);

            });

    }

    render()
    {
        return(

            <View style = { styles.MainContainer }>

                <TouchableOpacity
                  activeOpacity = { 0.5 }
                  style = { styles.TouchableOpacityStyle }
                  onPress = { this.show_Events }>

                    <Text style = { styles.TextStyle }>Show Events in console</Text>

                </TouchableOpacity>

            </View>
        );
    }
}

const styles = StyleSheet.create(
{
    MainContainer:
    {
      flex: 1,
      justifyContent: 'center',
      alignItems: 'center',
      margin: 20

    },



    TouchableOpacityStyle:
   {
      paddingTop:10,
      paddingBottom:10,
      backgroundColor:'#009688',
      marginBottom: 20,
      width: '90%'

    },

    TextStyle:
    {
       color: '#fff',
        textAlign: 'center',
        fontSize: 18
    }
});
export default Test
