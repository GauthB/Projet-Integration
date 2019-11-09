import React from 'react'
import { StyleSheet, View, Text, Platform, FlatList } from 'react-native'
import eventData from '../Helpers/EventData'
import EventItem  from './EventItem'

class Calendrier extends React.Component {

_displayDetail = (name, date, lieu, description) => {
  this.props.navigation.navigate("EventDetail", {name: name, date: date, lieu: lieu, description: description})
}

  render() {
    return (
      <View style={styles.main_container}>
            <Text style={styles.text_calendrier}>Calendrier</Text>
            <FlatList
              data={eventData}
              keyExtractor={(item) => item.id.toString()}
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
  }
})

export default Calendrier
