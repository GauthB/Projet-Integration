import React from 'react'
import { StyleSheet, View, Text, Platform, FlatList, ActivityIndicator } from 'react-native'
import eventData from '../Helpers/EventData'
import EventItem  from './EventItem'
import {Events} from '../Helpers/Utils'


class Calendrier extends React.Component {
  constructor(props) {
     super(props)
     this.state = {
      data:[],
      isLoading: true
    }
   }
   _displayLoading() {
 if (this.state.isLoading) {
   return (
     <View style={styles.loading_container}>
       <ActivityIndicator size='large' color='#c70039' />
     </View>
   )
 }
}

   componentDidMount(){
     Events().then((data) => {this.setState({data :data, isLoading: false})})
   }

   _displayDetail = (name, date, lieu, description) => {
  this.props.navigation.navigate("EventDetail", {name: name, date: date, lieu: lieu, description: description})
  }

  render() {
    return (
      <View style={styles.main_container}>
            <Text style={styles.text_calendrier}>Calendrier</Text>
            {this._displayLoading()}
            <FlatList
              data={this.state.data}
              keyExtractor={(item) => item.id}
              renderItem={({item}) => <EventItem event={item} displayDetail={this._displayDetail}/>}
            />
      </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531',

  },
  text_calendrier:{
    fontSize:30,
    color:'#c70039',
    marginLeft:10,
    marginTop:10,
    marginBottom : 30
  },
  loading_container:{
    position: 'absolute',
  left: 0,
  right: 0,
  top: 0,
  bottom: 0,
  alignItems: 'center',
  justifyContent: 'center'
  }
})

export default Calendrier
