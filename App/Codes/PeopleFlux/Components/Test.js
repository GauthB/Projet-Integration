import React, { Component } from 'react';

import { StyleSheet, View, TextInput, Text, ActivityIndicator, TouchableOpacity, FlatList } from 'react-native';
import {getEvents} from '../Helpers/Utils'



class Test extends React.Component
{

  constructor(props) {
     super(props)
     this.state = {
      data:[]
    }
   }


componentDidMount(){
  getEvents().then((data) => {this.setState({data})})

}

    render()
    {
        return(
            <View style = { styles.MainContainer }>


              <FlatList
                 data={this.state.data}
                 renderItem={({ item }) => <Text> {item.event_description} </Text>}
                 keyExtractor={item => item.event_id}
               />

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
