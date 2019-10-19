import React from 'react'
import { StyleSheet, View, Text, Platform, TouchableOpacity } from 'react-native'
import EventDetail from './EventDetail'


class EventItem extends React.Component {



  render() {
    const evenement=this.props.event

    return (
          <View style={styles.main_container}>
            <TouchableOpacity
            >
              <View style={styles.bordure}>
                <View style={styles.event_date}>
                  <Text style={styles.text_event}>{evenement.name}</Text>
                  <Text style={styles.text_date}>{evenement.date}</Text>
                </View>
                <Text style={styles.text_lieux}>{evenement.lieu}</Text>
              </View>
            </TouchableOpacity>
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

export default EventItem
