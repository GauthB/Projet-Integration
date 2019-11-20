import React, { Component } from 'react';

import { StyleSheet, View, TextInput, Text, ActivityIndicator, TouchableOpacity } from 'react-native';
import {Events} from '../Helpers/Utils'

class Test extends React.Component
{

  constructor(props) {
    super(props)
    this.state = {
      events:[]
    }

  }

    show_Events = () =>{
      Events().then(response => {this.setState({events:response})})

      console.log(this.state.events)


    }

    render()
    {
        return(

            <View style = { styles.MainContainer }>

                <TouchableOpacity
                  activeOpacity = { 0.5 }
                  style = { styles.TouchableOpacityStyle }
                  onPress = {this.show_Events}>

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
