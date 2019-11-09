import React from 'react'
import { StyleSheet, View, Text, Platform, FlatList } from 'react-native'
import eventData from '../Helpers/EventData'
import EventItem  from './EventItem'

class Calendrier extends React.Component {

_displayDetail = (description) => {
  this.props.navigation.navigate("EventDetail", {description: description})
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
  },

  bordure:{
    height: 60,
    borderColor: '#4B4C56',
    marginTop: 20,
    marginLeft:6,
    marginRight:6,
    borderRadius:30,
    backgroundColor: '#4B4C56',
  },
  event_date:{
    flexDirection:'row'
  },
  text_event:{
    fontWeight : 'bold',
    fontSize: 25,
    color: '#ff5733',
    marginLeft: 20,
    marginTop: 10
  },
  text_date:{
    fontSize: 15,
    color: '#fff',
    marginLeft: 50,
    marginTop: 20,
    position: 'absolute',
    right: 20
  },
  text_lieux:{
    fontSize: 10,
    color: '#fff',
    marginLeft: 20,

  }
})

export default Calendrier
